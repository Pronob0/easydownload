<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followerCreate($id){

        $auth_id=Auth::user()->id;


        if($id == 'admin'){
            $following_id=0;
            $admin_id=1;
        }
        else{
            $admin_id=0;
            $following_id=$id;
        }

        $followOrNot=Follow::where('following_id',$following_id)->where('follower_id',$auth_id)->first();
        if(empty($followOrNot)){
            $follow=new Follow();
            $follow->following_id=$following_id;
            $follow->follower_id=$auth_id;
            $follow->admin_id=$admin_id;
            $follow->save();
            return redirect()->back();
        }
    }
}
