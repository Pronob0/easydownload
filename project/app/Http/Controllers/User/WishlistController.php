<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except('addwish');
       //here what u asked, you can remove middleware in route
       //$this->middleware('admin')->only('home');
    }

    public function wishlists(Request $request)
    {
        $user = Auth::guard('web')->user();
       $data['admin']=Admin::first();
        $data['favourite'] = Wishlist::where('user_id','=',$user->id)->paginate(12);
        return view('user.wishlists', $data);
    }

    public function addwish($slug)
    {


        $user = Auth::guard('web')->user();

        Session::put('wishlist',url()->current());

        if(!$user){
            return response()->json(['error'=>1]);
        }

            $data = 0;
            $item=Item::where('slug',$slug)->first();
            $ck = Wishlist::where('user_id','=',$user->id)->where('item_id','=',$item->id)->get();

            $isUserProduct = Item::where('user_id','=',$user->id)->where('id','=',$item->id)->exists();


            if($ck->count() > 0)
            {
                if(request()->ajax()){
                    return response()->json(['status' => 0]);
                }else{
                    return redirect()->back();
                }

            }

            if($isUserProduct){
                if(request()->ajax()){
                return response()->json(['status' => 1]);
                }else{
                    return redirect()->back();
                }
            }

            $wish = new Wishlist();
            $wish->user_id = $user->id;
            $wish->item_id = $item->id;
            $wish->save();
            $data = 1;
            $count = Wishlist::where('user_id','=',$user->id)->count();
            if(request()->ajax()){
                return response()->json(['status' => 2, 'count' => $count]);
            }else{
                return redirect()->back();
            }

    }
    public function removewish($id)
    {
        $wish = Wishlist::findOrFail($id);
        $wish->delete();
        $count = Wishlist::where('user_id', Auth::user()->id)->count();
        return response()->json($count);
    }
}
