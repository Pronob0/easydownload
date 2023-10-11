<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminUserConversation;
use App\Models\AdminUserMessage;
use App\Models\AuthorBadge;
use App\Models\Follow;
use App\Models\Generalsetting;
use App\Models\Pagesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adminusercontact(Request $request)
    {

        $data = 1;
        $user = Auth::guard('web')->user();
        $gs = Generalsetting::findOrFail(1);
        $subject = $request->subject;
        $to = Pagesetting::find(1)->contact_email;
        $from = $user->email;
        $msg = "Email: ".$from."\nMessage: ".$request->message;
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

            $conv = AdminUserConversation::where('user_id','=',$user->id)->where('subject','=',$subject)->first();



        if(isset($conv)){
            $msg = new AdminUserMessage();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json($data);
        }
        else{
            $message = new AdminUserConversation();
            $message->subject = $subject;
            $message->user_id= $user->id;
            $message->text=$request->message;
            $message->admin_id=1;
            $message->save();

            $msg = new AdminUserMessage();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json($data);

        }


    }
    public function adminmessages()
    {
            $data['user'] = Auth::guard('web')->user();
            $data['convs'] = AdminUserConversation::where('user_id','=',$data['user']->id)->paginate(10);
            $data['followers']=Follow::where('following_id',Auth::user()->id)->paginate(6);
            $data['admin']=Admin::first();
            $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
            return view('user.ticket.index',$data);
    }
    public function adminmessage($id)
    {
            $data['followers']=Follow::where('following_id',Auth::user()->id)->paginate(6);
            $data['admin']=Admin::first();
            $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
            $data['conv'] = AdminUserConversation::findOrfail($id);
            return view('user.ticket.create',$data);
    }
    public function adminmessagedelete($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            if($conv->messages->count() > 0)
            {
                foreach ($conv->messages as $key) {
                    $key->delete();
                }
            }
            $conv->delete();
            return redirect()->back()->with('success','Message Deleted Successfully');
    }

    public function adminpostmessage(Request $request)
    {
        $msg = new AdminUserMessage();
        $input = $request->all();
        $msg->fill($input)->save();
        
        //--- Redirect Section
        $msg = 'Message Sent!';
        return response()->json($msg);
        //--- Redirect Section Ends
    }


}
