<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $cart = session()->get('cart');
        $data['cart'] = $cart;
        return view('frontend.cart', $data);
    }

    public function loadCartPopup($itemid, $cartItemId) {
        $item = Item::find($itemid);
        $data['item'] = $item;
        $data['cartItem'] = findById($cartItemId);

        return view('includes.cart-popup', $data);
    }

    public function loadItemDetails($itemid, $cartItemId) {
        $item = Item::find($itemid);
        $data['item'] = $item;
        $data['cartItem'] = findById($cartItemId);

        return view('includes.item-details', $data);
    }

    public function loadCart() {
        $data['cart'] = session()->get('cart');

        return view('includes.cart', $data);
    }

    public function addToCart(Request $request) {
        $cart = session()->get('cart');

        Session::has('already') ? Session::forget('already'):'';
        Session::has('coupon_price') ? Session::forget('coupon_price'):'';

        $id = $request->item_id;
        $item = Item::find($id);

        $gs = Generalsetting::first();

        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }

        $supportCharge = $gs->support_script;


        if ($request->license == 'extended') {
            $price = $item->extended_price;
            $includedSupport = ($supportCharge * $price) / 100;
        } else {
            $price = $item->regular_price;
            $includedSupport = 0.00;
        }


        $includedDuration = $gs->support_duration . ' months';
        $includedSupport = ($supportCharge * $price) / 100;
        $currTime = strtotime(Carbon::now());


        $cartItem = [
            'id' => uniqid(),
            'item_id' => $id,
            'author_id' => $item->user_id,
            'name' => $item->name,
            'support' => $includedDuration,
            'license' => $request->license,
            'included_support' => $includedSupport,
            'extended_support' => 0.00,
            'price' => $price,
            'total_price' => $price,
            'created_at' => $currTime
        ];

        $cart[] = $cartItem;
        session()->put('cart', $cart);

        return response()->json(['status' => 'success', 'cartItem' => $cartItem, 'cartLength' => count($cart)]);
    }

    public function remove($cartItemId)
    {
        $index = findIndex($cartItemId);
        $cart = session()->get('cart');
        unset($cart[$index]);
        session()->put('cart', $cart);

        return response()->json(['status' => 'success', 'cart' => session()->get('cart')]);
    }

    public function updateSelection(Request $request) {

        $cart = session()->get('cart');
        $gs = Generalsetting::first();

        $cartItem = findById($request->cart_item_id);
        $item = Item::find($cartItem["item_id"]);

        $cartItem['license'] = empty($request->license) ? $cartItem['license'] : $request->license;
        $cartItem['support'] = empty($request->support) ? $cartItem['support'] : $request->support;


        $supportCharge = $gs->support_script;


        if ($cartItem['license'] == 'extended') {
            $price = $item->extended_price;
            $includedSupport = ($supportCharge * $price) / 100;
        } else {
            $price = $item->regular_price;
            $includedSupport = 0.00;
        }



        $includedDuration = $gs->support_duration;


        if ($request->support == $includedDuration . ' months') {
            $cartItem["support"] = $includedDuration . ' months';
            $cartItem["included_support"] = $includedSupport;
            $cartItem["extended_support"] = 0.00;
            $cartItem["price"] = $price;
            $cartItem["total_price"] = $price;
        } else {
            $cartItem["support"] = $includedDuration * 2 . ' months';
            $extendedSupport = ($supportCharge * $price) / 100;
            $cartItem["included_support"] = $includedSupport;
            $cartItem["extended_support"] = $gs->support_script;
            $cartItem["price"] = $price;
            $cartItem["total_price"] = $price + $gs->support_script;
        }


        $index = findIndex($request->cart_item_id);
        $cart[$index] = $cartItem;

        session()->put('cart', $cart);

        return response()->json(['status' => 'success', 'cartItem' => $cartItem]);
    }

}
