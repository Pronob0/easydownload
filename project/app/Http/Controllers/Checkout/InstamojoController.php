<?php

namespace App\Http\Controllers\Checkout;

use App\Classes\GeniusMailer;
use App\Classes\Instamojo;
use App\Http\Controllers\Controller;
use App\Models\AuthorLevel;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\PaymentGateway;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserSubscription;
use App\Models\Item as AppItem;

use Carbon\Carbon;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PayPal\Api\Item;

class InstamojoController extends Controller
{

 public function store(Request $request){


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



    if (Session::has('currency'))
    {
        $curr = Currency::find(Session::get('currency'));
    }
    else
    {
        $curr = Currency::where('is_default','=',1)->first();
    }



    if($curr->name != "INR")
    {
        return redirect()->back()->with('unsuccess','Please Select INR Currency For Instamojo.');
    }

    $CartTotal= cartTotal();

    if (empty(session()->get('cart'))) {
        return redirect()->route('front.add.cart')->with('unsuccess',__("You don't have any product to checkout."));
    }

    $cart = session()->get('cart');



    $user = Auth::user();
    $order['item_name'] = $gs->title." Order";
    $order['item_number'] = Str::random(4).time();
    $order['item_amount'] = round($CartTotal,2);
    $cancel_url = route('front.payment.cancle');
    $notify_url = action('Checkout\InstamojoController@notify');
    Session::put('user_data',$input);

    $gateway_data = PaymentGateway::where('keyword','instamojo')->first();
    $gateway = $gateway_data->convertAutoData();


     if($gateway['sandbox_check'] == 1){
        $api = new Instamojo($gateway['key'], $gateway['token'], 'https://test.instamojo.com/api/1.1/');
    }else {
        $api =  new Instamojo($gateway['key'], $gateway['token']);
    }

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $order['item_name'],
            "amount" => $order['item_amount'],
            "send_email" => false,
            "email" => $user->email,
            "redirect_url" => $notify_url
            ));

        $redirect_url = $response['longurl'];
        $dep['user_id'] = $user->id;
        $dep['currency'] = "USD";
        $dep['amount'] = $order['item_amount'];
        $dep['item_name']=$order['item_name'];
        $dep['method'] = 'Instamojo';

        Session::put('checkout',$dep);
        Session::put('order_payment_id', $response['id']);

        $data['total'] =  $order['item_amount'];
        $data['return_url'] = $notify_url;
        $data['cancel_url'] = $cancel_url;
        Session::put('paypal_items',$data);
        return redirect($redirect_url);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }

 }


public function notify(Request $request){
    if (Session::has('currency'))
    {
        $curr = Currency::find(Session::get('currency'));
    }
    else
    {
        $curr = Currency::where('is_default','=',1)->first();
    }

    $input_data = $request->all();

    $sub = Session::get('checkout');
    $input = Session::get('user_data');
    $paypal_data = Session::get('paypal_data');
    $payment_id = Session::get('order_payment_id');
    $paypal_items = Session::get('paypal_items');
    $success_url = route('front.payment.return');
    $cancel_url = route('front.payment.cancle');

    if($payment_id ){

        $cart = session()->get('cart');
        foreach ($cart as $key => $cartItem) {
            if ($cartItem["author_id"] == Auth::user()->id) {
                return redirect()->route('front.add.cart')->with('error', __("You cannot purchase your own item."));
            }
        }

        $lastOrder = Order::orderBy('id', 'DESC')->first();
        $lastOrderId = !empty($lastOrder) ? $lastOrder->id + 1 : 0;

        $order = new Order();
        $order->order_number = 100000000000 + $lastOrderId;
        $order->user_id = Auth::user()->id;
        $order->method = 'instamojo';
        $order->billing_first_name = $input["first_name"];
        $order->billing_last_name = $input["last_name"];
        $order->billing_company_name = $input["company_name"];
        $order->billing_email_address = $input["email_address"];
        $order->billing_country = $input["country"];
        $order->billing_state = $input["state"];
        $order->billing_zipcode = $input["zipcode"];
        $order->billing_address = $input["address"];
        $order->txnid=$payment_id ;
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






