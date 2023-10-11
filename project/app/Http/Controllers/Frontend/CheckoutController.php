<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AuthorLevel;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\PaymentGateway;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function loadpayment($slug1,$slug2)
    {
        $data['curr'] = "USD";
        $data['payment'] = $slug1;
        $data['pay_id'] = $slug2;
        $data['gateway'] = '';
        if($data['pay_id'] != 0) {
            $data['gateway'] = PaymentGateway::findOrFail($data['pay_id']);
        }


        return view('load.payment',$data);
    }

    public function index() {
        $cart = session()->get('cart');

        if (empty($cart)) {
            return back();
        }

        $data['cart'] = $cart;

        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }


        $user = Auth::check() ? Auth::user() : '';
        $data['firstName'] = Auth::check() ? $user->name : '';
        $data['lastName'] = Auth::check() ? $user->username : '';
        $data['company'] = Auth::check() ? $user->billing_company : '';
        $data['email'] = Auth::check() ? $user->email : '';
        $data['country'] = Auth::check() ? $user->country : '';
        $data['state'] = Auth::check() ? $user->state : '';
        $data['zipcode'] = Auth::check() ? $user->zip : '';
        $data['address'] = Auth::check() ? $user->address : '';
        $data['gateways'] =  PaymentGateway::whereStatus(1)->latest('id')->get();
        $data['gs'] = Generalsetting::select('tax')->first();
        $data['currency']=Currency::where('is_default','=',1)->first();

        $paystack = PaymentGateway::whereKeyword('paystack')->first();
        $data['paystackData'] = $paystack->convertAutoData();


        return view('frontend.checkout', $data,['curr' => $curr]);
    }

    public function paycancle(){
        return redirect()->route('front.checkout.index')->with('error',__('Payment Cancelled.'));
    }


    public function payreturn(){
        return view('frontend.success');
    }
}
