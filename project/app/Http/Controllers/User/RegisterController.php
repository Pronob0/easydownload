<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\RegisterBonus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

   public function registerform(){
       return view('user.register');
   }


   public function register(Request $request){

    $gs = Generalsetting::findOrFail(1);

    	if($gs->is_capcha == 1)
    	{
            $rules = [
                'username'=>'required',
                'name'   => 'required|max:50|unique:users',
                'email'   => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'g-recaptcha-response' => 'required',
                
                ];

    	}
        else{
            $rules = [
                'username'=>'required',
                'name'   => 'required|max:50|unique:users',
                'email'   => 'required|email|unique:users',
                'password' => 'required|confirmed',

                ];

        }

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
      }
      $gs = Generalsetting::findOrFail(1);

      $user = new User;
      $bonus=RegisterBonus::first();
      $input = $request->all();
      $input['password'] = bcrypt($request['password']);
      $token = md5(time().$request->name.$request->email);
      $input['verification_link'] = $token;
      $input['balance'] = $bonus->bonus;
      $user->fill($input)->save();

      if($gs->is_verification_email == 1)
      {
      $to = $request->email;
      $subject = 'Verify your email address.';
      $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('user/register/verify/'.$token).">Simply click here to verify. </a>";
      //Sending Email To Customer
      if($gs->is_smtp == 1)
      {
      $data = [
          'to' => $to,
          'subject' => $subject,
          'body' => $msg,
      ];


      $mailer = new GeniusMailer();
      $mailer->sendCustomMail($data);
      }
      else
      {
      $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
      mail($to,$subject,$msg,$headers);
      }
        return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
      }
      else {
        $user->status=1;
        $user->email_verified_at = Carbon::now();
        $user->update();
        Auth::guard('web')->login($user);
        return response()->json(1);
      }
    }

      public function token($token)
    {
        $user = User::where('verification_link','=',$token)->first();
        if(isset($user)){
            if($user->email_verified_at != '' && $user->status = 1){
                return redirect()->route('user.dashboard')->with('success', 'Already Verified!');
            }
            $user->email_verified_at = Carbon::now();
            $user->status = 1;
            $user->update();
            Auth::guard('web')->login($user);
           return redirect()->route('user.dashboard');

        }
        else{
            return redirect()->route('user.login')->with('success', 'Verification token mismatch');
        }

    }



   }






