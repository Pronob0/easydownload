<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    Models\Order,
    Models\PaymentGateway,
    Classes\GeniusMailer
};
use App\Models\AuthorLevel;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Item as AppItem;
use Illuminate\Support\Str;
use App\Models\OrderedItem;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PayPal\{
    Api\Item,
    Api\Payer,
    Api\Amount,
    Api\Payment,
    Api\ItemList,
    Rest\ApiContext,
    Api\Transaction,
    Api\RedirectUrls,
    Api\PaymentExecution,
    Auth\OAuthTokenCredential
};

class PaypalController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        $data = PaymentGateway::whereKeyword('paypal')->first();
        $paydata = $data->convertAutoData();
        $paypal_conf = \Config::get('paypal');
        $paypal_conf['client_id'] = $paydata['client_id'];
        $paypal_conf['secret'] = $paydata['client_secret'];
        $paypal_conf['settings']['mode'] = $paydata['sandbox_check'] == 1 ? 'sandbox' : 'live';
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
        ]);

        $input = $request->all();
        $gs = Generalsetting::first();

        if (empty(session()->get('cart'))) {
            return redirect()->route('front.add.cart')->with('unsuccess',__("You don't have any product to checkout."));
        }

        $cart = session()->get('cart');
        foreach ($cart as $key => $cartItem) {
            if ($cartItem["author_id"] == Auth::user()->id) {
                return redirect()->route('front.add.cart')->with('unsuccess', __("You cannot purchase your own item."));
            }
        }

        if (Session::has('currency'))
        {
          $curr = Currency::find(Session::get('currency'));
        }
        else
        {
          $curr = Currency::where('is_default','=',1)->first();
        }

        $avilableCurrency = ['USD'];

        if(!in_array($curr->name,$avilableCurrency)){
            return redirect()->route('front.checkout.index')->with('unsuccess','Please Select USD for Stripe');
        }


        $order['item_name'] = $gs->title." Order";
        $order['item_number'] = Str::random(4).time();
        $order['item_amount'] = cartTotal();
        $cancel_url = route('front.payment.cancle');
        $notify_url = route('front.paypal.notify');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($order['item_name']) /** item name **/
            ->setCurrency($curr->name)
            ->setQuantity(1)
            ->setPrice($order['item_amount']); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency($curr->name)
            ->setTotal($order['item_amount']);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($order['item_name'].' Via Paypal');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl($notify_url) /** Specify return URL **/
            ->setCancelUrl($cancel_url);
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            return redirect()->back()->with('unsuccess',$ex->getMessage());
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('input_data',$input);
        Session::put('order_data',$order);
        Session::put('order_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return \Redirect::away($redirect_url);
        }
        return redirect()->back()->with('unsuccess',__('Unknown error occurred'));

    }

    public function notify(Request $request)
    {
        $input = Session::get('input_data');
        $order_data = Session::get('order_data');
        $success_url = route('front.payment.return');
        $cancel_url = route('front.payment.cancle');
        $input_data = $request->all();
        $payment_id = Session::get('order_payment_id');

        if (empty( $input_data['PayerID']) || empty( $input_data['token'])) {
            return redirect($cancel_url);
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($input_data['PayerID']);

        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            $resp = json_decode($payment, true);

            $cart = session()->get('cart');
            $lastOrder = Order::orderBy('id', 'DESC')->first();
            $lastOrderId = !empty($lastOrder) ? $lastOrder->id + 1 : 0;


            $order = new Order();
            $order->order_number = 100000000000 + $lastOrderId;
            $order->user_id = Auth::user()->id;
            $order->method = 'paypal';
            $order->billing_first_name = $input["first_name"];
            $order->billing_last_name = $input["last_name"];
            $order->billing_company_name = $input["company_name"];
            $order->billing_email_address = $input["email_address"];
            $order->billing_country = $input["country"];
            $order->billing_state = $input["state"];
            $order->billing_zipcode = $input["zipcode"];
            $order->billing_address = $input["address"];
            $order->txnid = $resp['transactions'][0]['related_resources'][0]['sale']['id'];
            $order->save();

            foreach ($cart as $key => $cartItem) {
                $orderedItem = new OrderedItem();
                $orderedItem->order_id = $order->id;
                $orderedItem->invoice_number = uniqid();
                $orderedItem->author_id = $cartItem["author_id"];
                $orderedItem->item_id = $cartItem["item_id"];
                $orderedItem->support = $cartItem["support"];
                $orderedItem->license = $cartItem["license"];
                $orderedItem->included_support = 0.00;
                $orderedItem->extended_support = $cartItem["extended_support"];
                $orderedItem->price = $cartItem["price"];
                $orderedItem->total_price = $cartItem["price"]+$orderedItem->included_support+$cartItem["extended_support"];
                $orderedItem->item_info = json_encode(AppItem::whereId($cartItem["item_id"])->first()->toArray(),true);
                $orderedItem->author_info = json_encode(User::whereId($cartItem["author_id"])->first()->toArray(),true);
                $duration = str_replace(" months","", $cartItem["support"]);
                $duration = (int)$duration;
                $d = now();
                $d = Carbon::parse($d);
                $d->addMonths($duration);
                $orderedItem->support_valid_till = date("Y-m-d h:i:sa", strtotime($d));

                $orderedItem->save();

                // add money to corresponding author's account
                $license = $orderedItem->license;
                $author = $orderedItem->item->user;
                $itemPrice = $orderedItem->total_price;

                $authorLevelRate = 0;
                $authorLevels = AuthorLevel::whereStatus(1)->orderBy('amount','DESC')->get();
                $autor = User::findOrFail($cartItem["author_id"]);
                foreach($authorLevels as $level){
                    if($level->amount >= $autor->total_sell){
                        $authorLevelRate = $level->rate;
                    }
                    else{
                        $max=DB::table('author_levels')->where('amount', DB::raw("(select max(`amount`) from author_levels)"))->where('status',1)->first();
                        $authorLevelRate=$max->rate;
                    }
                }


                if ($license == 'regular') {
                    $subtotal = $itemPrice - $orderedItem->item->category->regular_buyer_fee;

                    $total = $subtotal - (($authorLevelRate * $subtotal)/100);
                    $author->balance = $author->balance + $total;

                } elseif ($license == 'extended') {
                    $subtotal = $itemPrice - $orderedItem->item->category->extended_buyer_fee;
                    $total = $subtotal - (($authorLevelRate * $subtotal)/100);
                    $author->balance = $author->balance + $total;

                }

                $orderedItem->author_profit = $total;

                if($orderedItem->author_id){
                    $author->total_sell += $total;
                }

                $orderedItem->admin_profit = $itemPrice - $total;
                $orderedItem->update();
                $author->update();


                $item = AppItem::findOrFail($cartItem["item_id"]);
                $item->increment('sell');
            }

            Session::forget('cart');
            Session::forget('input_data');
            Session::forget('order_data');
            $gs = Generalsetting::findOrFail(1);

            if($gs->is_smtp == 1)
            {
            $data = [
                'to' => $order->billing_email_address,
                'type' => "new_purchase",
                'cname' => $order->billing_first_name,
                'oamount' => "",
                'aname' => "",
                'aemail' => "",
                'wtitle' => "",
                'onumber' => $order->order_number,
            ];



            $mailer = new GeniusMailer();
            $mailer->sendAutoOrderMail($data,$order->id);


            return redirect($success_url);

        }
        return redirect($cancel_url);
    }
    }
}
