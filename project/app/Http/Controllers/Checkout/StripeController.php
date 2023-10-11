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
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function __construct()
    {
        $data = PaymentGateway::whereKeyword('stripe')->first();
        $paydata = $data->convertAutoData();
        \Config::set('services.stripe.key', $paydata['key']);
        \Config::set('services.stripe.secret', $paydata['secret']);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $user= Auth::user();
        $gs= Generalsetting::first();

        if ($request->pass_check) {
            $auth = OrderHelper::auth_check($input);
            if (!$auth['auth_success']) {
                return redirect()->back()->with('unsuccess', $auth['error_message']);
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

        if (!Session::has('cart')) {
            return redirect()->route('front.add.cart')->with('unsuccess', __("You don't have any product to checkout."));
        }

        $cart = session()->get('cart');
        foreach ($cart as $key => $cartItem) {
            if ($cartItem["author_id"] == Auth::user()->id) {
                return redirect()->route('front.add.cart')->with('unsuccess', __("You cannot purchase your own item."));
            }
        }

        $item_name = $gs->title . " Order";
        $item_number = Str::random(4) . time();
        $item_amount = cartTotal();
        $success_url = route('front.payment.return');


        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'cardNumber' => 'required',
            'cardCVC' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $stripe = Stripe::make(\Config::get('services.stripe.secret'));

        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $input['cardNumber'],
                    'exp_month' => $input['month'],
                    'exp_year' => $input['year'],
                    'cvc' => $input['cardCVC'],
                ],
            ]);

            if (!isset($token['id'])) {
                return back()->with('error', __('Token Problem With Your Token.'));
            }

            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => "USD",
                'amount' => $item_amount,
                'description' => $item_name,
            ]);

            if ($charge['status'] == 'succeeded') {
                $cart = session()->get('cart');
                $lastOrder = Order::orderBy('id', 'DESC')->first();
                $lastOrderId = !empty($lastOrder) ? $lastOrder->id + 1 : 0;


                $order = new Order();
                $order->order_number = 100000000000 + $lastOrderId;
                $order->user_id = Auth::user()->id;
                $order->method = 'stripe';
                $order->billing_first_name = $input["first_name"];
                $order->billing_last_name = $input["last_name"];
                $order->billing_company_name = $input["company_name"];
                $order->billing_email_address = $input["email_address"];
                $order->billing_country = $input["country"];
                $order->billing_state = $input["state"];
                $order->billing_zipcode = $input["zipcode"];
                $order->billing_address = $input["address"];
                $order->txnid=$charge['balance_transaction'];
                $order->save();

                if (Session::has('currency')) {
                    $curr = DB::table('currencies')->find(Session::get('currency'));
                }
                else {
                    $curr = DB::table('currencies')->where('is_default','=',1)->first();
                }

                



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
        } catch (Exception $e) {
            return back()->with('unsuccess', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            return back()->with('unsuccess', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            return back()->with('unsuccess', $e->getMessage());
        }
        return back()->with('unsuccess', __('Please Enter Valid Credit Card Informations.'));
    }
}
