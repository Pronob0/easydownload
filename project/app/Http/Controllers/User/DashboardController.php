<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminUserConversation;
use App\Models\AuthorBadge;
use App\Models\AuthorLevel;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Dispute;
use App\Models\Follow;
use App\Models\Generalsetting;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(){
        $cats = Category::all();
        $user= Auth::user()->id;
        $items=Item::where('user_id','=',$user)->orderBy('id','desc')->get();
        $data['levels']=AuthorLevel::where('status',1)->orderBy('amount','DESC')->get();
        $data['max']=DB::table('author_levels')->where('amount', DB::raw("(select max(`amount`) from author_levels)"))->where('status',1)->first();
         $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        return view('user.dashboard',$data,compact('cats','items'));
    }

    public function portfolio($slug){
        $slug2=str_replace('-',' ',$slug);
        $id=Auth::user()->id;
        $data['user']= User::where('username',$slug2)->get();
        $data['follow']=Follow::where('following_id',$data['user'])->where('follower_id',$id)->first();
        $hp=Item::where('user_id','=',$data['user'])->orderBy('id','desc')->get();
        $sign= Currency::where('is_default','=',1)->first();
        $badges=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        return view('user.portfolio',$data,compact('hp','sign','badges'));
    }

    public function followers(){
        $followers=Follow::where('following_id',Auth::user()->id)->paginate(6);
        $data['admin']=Admin::first();
        $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        return view('user.followers',$data,compact('followers'));

    }

    public function following(){
        $followers=Follow::where('follower_id',Auth::user()->id)->paginate(6);
        $admin=Admin::first();
        return view('user.following',compact('followers','admin'));

    }

    public function setting(){
        $data=Auth::user();

        return view('user.setting',compact('data'));
    }

    public function download(){
        $userId = Auth::user()->id;
        $data['orders'] = Order::where('user_id',$userId)->orderBy('id','desc')->get();
        $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        return view('user.downloads',$data);
    }
    public function getfile(Request $request) {
        // dd($request->file);
        $product=Item::where('slug',$request->file)->first();
        $file_path = 'assets/files/'.$product->main_filename;
         return response()->download($file_path);
      }

    public function reviews(){

       $item=Item::where('user_id',Auth::user()->id)->paginate(10);
       $badges=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        return view('user.reviews',compact('item','badges'));
    }


    // OrderedItem::where('author_id',Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
    public function statements(){
                                    $data['ots'] = OrderedItem::join('orders', 'orders.id', '=', 'ordered_items.order_id')
                                    ->select('ordered_items.*')
                                    ->where('ordered_items.author_id', Auth::user()->id)
                                    ->orderBy('ordered_items.id', 'DESC')
                                    ->paginate(5);

         $date=Carbon::now()->subDays(30);
         $data['sell']=OrderedItem::where('author_id',Auth::user()->id)->where('created_at','>=',$date)->where('refund',0)->sum('author_profit');
        return view('user.statements', $data);
    }
      public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $cart = OrderedItem::findOrFail($id);

        return view('user.invoice',compact('order','cart'));
    }

    public function changepassword(Request $request)
    {

        $rules = [
            'old_password'=>'required',
            'password'=>'required|confirmed',
             ];

        $validator = Validator::make($request->all(), $rules);

          if ($validator->fails()) {
             return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }

            $hashedpassword=Auth::user()->password;
            if(Hash::check($request->old_password, $hashedpassword)){
                if(!Hash::check($request->password, $hashedpassword)){

                    $user=User::find(Auth::id());
                    $user->password=Hash::make($request->password);
                    $user->save();
                    $msg = 'Successfully change your password';
                    return response()->json($msg);
                }
                else{
                    return response()->json(array('errors' => [ 0 => 'Password Can not be same' ]));


                }
            }
            else{
                return response()->json(array('errors' => [ 0 => 'Password not matched!' ]));
            }

    }

    public function update(Request $request, $id)
    {
        //--- Validation Section
        $user = User::findOrFail($id);
        $rules = [
            'email' => 'required|unique:users,email,'.$id,
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'username'=>'required|unique:users,username,'.$id
             ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends


        $data = $request->all();
        if ($file = $request->file('photo'))
        {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images',$name);
            if($user->photo != null)
            {
                if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                    unlink(public_path().'/assets/images/'.$user->photo);
                }
            }
            $data['photo'] = $name;

        }
        $user->update($data);
        $msg = 'Customer Information Updated Successfully.';
        return response()->json($msg);
    }

    public function become_author(){

        return view('user.become_author');
    }
    public function author(Request $request){

        $user = Auth::guard('web')->user();
       $input=$request->all();
       if($request['is_author'] == 'author'){
        $input['is_author']=1;
        $input['dashboard_banner']='laravel.jpg';
    }
        $user->update($input);
        return redirect()->back();
    }

    public function hiddenitem(){

     $user= Auth::user();
     $hp=Item::where('user_id','=',$user->id)->orderBy('id','desc')->get();
     $sign= Currency::where('is_default','=',1)->first();
     $badges=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
    return view('user.hidden-items',compact('hp','sign','user','badges'));
    }



    public function dashboard(Request $request, $id)
    {
        //--- Validation Section

        $rules = [
               'dashboard_banner' => 'mimes:jpeg,jpg,png,svg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $user = User::findOrFail($id);
        $data = $request->all();

        if ($file = $request->file('dashboard_banner'))
        {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images',$name);
            if($user->dashboard_banner != 'laravel.jpg')
            {
                if (file_exists(public_path().'/assets/images/'.$user->dashboard_banner)) {
                    unlink(public_path().'/assets/images/'.$user->dashboard_banner);
                }
            }
            $data['dashboard_banner'] = $name;

        }

        $user->update($data);
        $msg = 'Dashboard Updated Successfully.';
        return response()->json($msg);
    }

    public function printpage($id)
    {
        $order = Order::findOrFail($id);
        $cart = OrderedItem::findOrFail($id);
        return view('user.print',compact('order','cart'));
    }

    public function purchasehistory(){
        $data['orders']=Order::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        return view('user.purchased.purchasehistory',$data);
    }
    public function purchasedetails($id){
          $data['order']=OrderedItem::findOrFail($id);
          $data['disputes']=Dispute::where('orderedItem_id',$data['order']->id)->get();
          $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
          return view('user.purchased.purchase_details',$data);

    }

    public function refund(Request $request,$id){

        $orderItem=OrderedItem::findOrFail($id);
        if($orderItem->refund_seen==1){
            return response()->json(array('errors' =>'Request Sent Already'));
        }
        else{
        $dispute= new Dispute();
        $input=$request->all();
        $dispute->orderedItem_id=$orderItem->id;
        $dispute->user_id=Auth::user()->id;
        $dispute->is_buyer=1;
        $dispute->text=$request->text;
        $dispute->fill($input)->save();

        $orderItem->refund_seen=1;
        $orderItem->update();

        $msg = 'Data Sent Successfully';
        return response()->json($msg);

        }

    }


    public function refundlist(){
        $data['orderitems']= OrderedItem::where('author_id',Auth::user()->id)->where('refund_seen',1)->paginate(10);
        return view('user.refund.request',$data);
    }

    public function refunddetails($id){
        $order=OrderedItem::findOrFail($id);
        $data['levels']=AuthorLevel::where('status',1)->orderBy('amount','DESC')->get();
        $data['max']=DB::table('author_levels')->where('amount', DB::raw("(select max(`amount`) from author_levels)"))->where('status',1)->first();
         $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        $disputes=Dispute::where('orderedItem_id',$order->id)->get();
        $buyer=Order::where('id',$order->order_id)->first();
         $user=User::where('id',$buyer->user_id)->first();
        return view('user.refund.refund_details',$data,compact('order','disputes','buyer','user'));
    }

    public function refund_approve($id){
        $order=OrderedItem::findOrFail($id);
        $order->item->decrement('sell');
        $order->refund=1;
        $order->update();
        $user=$order->order->user;
        $user->balance=$user->balance+$order->total_price;
        $author=User::where('id',$order->author_id)->first();
        $author->balance=$author->balance-$order->author_profit;
        $user->update();
        $author->update();

        return redirect()->back()->with('success', 'Refund Approved ! ');
    }

    public function refund_reply(Request $request, $id){


        $orderItem=OrderedItem::findOrFail($id);
        $dispute= new Dispute();
        $input=$request->all();
        $dispute->orderedItem_id=$orderItem->id;
        $dispute->user_id=Auth::user()->id;
        $dispute->is_buyer=$request->is_buyer;
        $dispute->is_seller=$request->is_seller;
        $dispute->text=$request->text;
        $dispute->fill($input)->save();
        $msg = 'Data Sent Successfully';
        return response()->json($msg);




    }

    public function social(Request $request, $id){
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        $msg = 'Customer Information Updated Successfully.';
        return response()->json($msg);
    }

    public function contact(Request $request){

        $gs = Generalsetting::findOrFail(1);

        if($gs->is_verification_email == 1)
        {
            $to = $request->userEmail;


            $subject = '['.$gs->title.']' .'Message sent via your Digital Market profile';

            $msg = $request->message;
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
        }
        $msg = 'Message Sent Successfully.';
        return response()->json($msg);

}

   public function refund_decline($id){
    $order=OrderedItem::findOrFail($id);
    $order->refund=2;
    $order->update();
    return redirect()->back()->with('success', 'Refund Declined ! ');
   }

}
