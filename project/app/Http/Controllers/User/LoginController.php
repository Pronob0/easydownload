<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\Socialsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest', ['except' => ['logout','resentverifylink']]);
    }

    public function loginform(){


        $socialsetting=Socialsetting::find(1);
        return view('user.login',compact('socialsetting'));
    }

    public function login(Request $request)
    {
        //--- Validation Section
        $gs = Generalsetting::findOrFail(1);
        if($gs->is_capcha == 1)
    	{
        $rules = [
            'email'   => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
          ];
        }
        else{
            $rules = [
                'email'   => 'required|email',
                'password' => 'required'
              ];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        // Attempt to log the user in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Autoload::agent();

            if(Auth::guard('web')->user()->email_verified_at == null)
            {
                Auth::guard('web')->logout();
                $msg = array(
                    'type' => 'warn',
                    'message' => "Your Email is not Verified!"
                );
                return response()->json(array('errors' => $msg));
            }

            if(Auth::guard('web')->user()->ban == 1){
                $msg = array(
                    'type' => 'warn',
                    'message' => "Your Account Has Been Banned.!"
                );
                 return response()->json(array('errors' => $msg));
            }
            if(Session::has('checkout')){

                 return response()->json(session::get('checkout'));
            }
             if(Session::has('wishlist')){


                return response()->json(session::get('wishlist'));
             }

              return response()->json(route('user.dashboard'));


        }else{
            $msg = array(
                'type' => 'warn',
                'message' => "Credentials Doesn\'t Match !"
            );
            return response()->json(array('errors' => $msg));
        }


    }
    public function logout()
    {
        Session::forget('checkout');
        Session::forget('wishlist');
        Auth::guard('web')->logout();
        return redirect()->route('front.index');
    }

}
