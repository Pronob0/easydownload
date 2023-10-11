<?php

namespace App\Http\Controllers\Checkout;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\AuthorLevel;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\PaymentGateway;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FlutterwaveController extends Controller
{
    public $public_key;
    private $secret_key;

    public function __construct()
    {

        $data = PaymentGateway::whereKeyword('flutterwave')->first();
        $paydata = $data->convertAutoData();
        $this->public_key = $paydata['public_key'];
        $this->secret_key = $paydata['secret_key'];

    }

    public function store(Request $request)
    {

        $input = $request->all();
        $gs= Generalsetting::first();

        if($request->pass_check) {
            $auth = OrderHelper::auth_check($input); // For Authentication Checking
            if(!$auth['auth_success']){
                return redirect()->back()->with('unsuccess',$auth['error_message']);
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

        $available_currency=[
            'GHS','KES','NGN','TZS','UGX','USD','ZAR'
        ];
        if(!in_array($curr->name,$available_currency))
        {
        return redirect()->back()->with('unsuccess','Invalid Currency For FlutterWave.');
        }
        if (!Session::has('cart')) {
            return redirect()->route('front.add.cart')->with('unsuccess', __("You don't have any product to checkout."));
        }
            $cart = session()->get('cart');
            foreach ($cart as $key => $cartItem) {
                if ($cartItem["author_id"] == Auth::user()->id) {
                return redirect()->route('front.add.cart')->with('unsuccess', __("You cannot purchase your own item."));
                }
            }

            $order['item_name'] = $gs->title . " Order";
            $order['item_number']= Str::random(4) . time();
            $order['item_amount'] = cartTotal();
            $notify_url = route('front.flutter.notify');
            $cancel_url = route('front.payment.cancle');

                Session::put('input_data',$input);
                Session::put('order_data',$order);
                Session::put('order_payment_id', $order['item_number']);

                $curl = curl_init();

                $customer_email = $request->email_address;
                $amount = $order['item_amount'];
                $currency = $curr->name;
                $txref = $order['item_number'];
                $PBFPubKey = $this->public_key;
                $redirect_url = $notify_url;
                $payment_plan = "";



                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                      'amount' => $amount,
                      'customer_email' => $customer_email,
                      'currency' => $currency,
                      'txref' => $txref,
                      'PBFPubKey' => $PBFPubKey,
                      'redirect_url' => $redirect_url,
                      'payment_plan' => $payment_plan
                    ]),
                    CURLOPT_HTTPHEADER => [
                      "content-type: application/json",
                      "cache-control: no-cache"
                    ],
                  ));
                  $response = curl_exec($curl);
                  $err = curl_error($curl);


                  if($err){
                    // there was an error contacting the rave API
                    return redirect($cancel_url)->with('unsuccess','Curl returned error: ' . $err);
                  }
                  $transaction = json_decode($response);


                  if(!$transaction->data && !$transaction->data->link){
                    // there was an error from the API
                    return redirect($cancel_url)->with('unsuccess','API returned error: ' . $transaction->message);
                  }

                    return redirect($transaction->data->link);
    }

    public function notify(Request $request)
    {

        $input = Session::get('input_data');
        $order_data = Session::get('order_data');
        $success_url = route('front.payment.return');
        $cancel_url = route('front.payment.cancle');
        $input_data = $request->all();
        $payment_id = Session::get('order_payment_id');

        if($request->cancelled == "true"){
            return redirect()->route('front.cart')->with('success',__('Payment Cancelled!'));
        }
        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }

        if (isset($input_data['txref'])) {
            $ref = $payment_id;

            $query = array(
                "SECKEY" => $this->secret_key,
                "txref" => $ref
            );

            $data_string = json_encode($query);
            $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $response = curl_exec($ch);
            curl_close($ch);
            $resp = json_decode($response, true);



            if ($resp['status'] = "success") {

                if(!empty($resp['data'])){

                    $paymentStatus = $resp['data']['status'];
                    $chargeResponsecode = $resp['data']['chargecode'];

                    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($paymentStatus == "successful")) {

                        $lastOrder = Order::orderBy('id', 'DESC')->first();
                        $lastOrderId = !empty($lastOrder) ? $lastOrder->id + 1 : 0;
                        $cart = session()->get('cart');
                        $order = new Order();
                        $order->order_number = 100000000000 + $lastOrderId;
                        $order->user_id = Auth::user()->id;
                        $order->method = 'flutterwave';
                        $order->billing_first_name = $input["first_name"];
                        $order->billing_last_name = $input["last_name"];
                        $order->billing_company_name = $input["company_name"];
                        $order->billing_email_address = $input["email_address"];
                        $order->billing_country = $input["country"];
                        $order->billing_state = $input["state"];
                        $order->billing_zipcode = $input["zipcode"];
                        $order->billing_address = $input["address"];
                        $order->txnid = $resp['data']['txid'];
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
                            $orderedItem->item_info = json_encode(Item::whereId($cartItem["item_id"])->first()->toArray(),true);
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


                            $item = Item::findOrFail($cartItem["item_id"]);
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

                }
            }
        }
        return redirect($cancel_url);
    }
    }
}
