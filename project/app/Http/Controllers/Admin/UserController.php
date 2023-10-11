<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\Rating;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth:admin');
        }

        //*** JSON Request
        public function datatables()
        {
             $datas = User::orderBy('id')->get();
             //--- Integrating This Collection Into Datatables
             return Datatables::of($datas)
                                ->addColumn('action', function(User $data) {

                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin-user-show',$data->id) . '"  class="dropdown-item">'.__("Details").'</a>
                                  <a href="' . route('admin-user-edit',$data->id) . '" class="dropdown-item" >'.__("Edit").'</a>
                                  <a href="javascript:;" class="dropdown-item" data-email="'. $data->email .'" data-toggle="modal" data-target="#vendorform">'.__("Send").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin-user-delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';
                                })

                                ->addColumn('status', function(User $data) {
                                    $status      = $data->ban == 1 ? __('Block') : __('Unblock');
                                   $status_sign = $data->ban == 1 ? 'danger'   : 'success';

                                return '<div class="btn-group mb-1">
                                   <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     '.$status .'
                                   </button>
                                   <div class="dropdown-menu" x-placement="bottom-start">
                                     <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin-user-ban',['id1' => $data->id, 'id2' => 0]).'">'.__("Unblock").'</a>
                                     <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin-user-ban',['id1' => $data->id, 'id2' => 1]).'">'.__("Block").'</a>
                                   </div>
                                 </div>';

                               })
                                ->rawColumns(['action','status'])
                                ->toJson(); //--- Returning Json Data To Client Side
        }





        //*** GET Request
        public function index()
        {
            return view('admin.user.index');
        }

        //*** GET Request
        public function image()
        {
            return view('admin.generalsetting.user_image');
        }

        //*** GET Request
        public function show($id)
        {
            $data = User::findOrFail($id);
            return view('admin.user.show',compact('data'));
        }

        //*** GET Request
        public function ban($id1,$id2)
        {
            $user = User::findOrFail($id1);
            $user->ban = $id2;
            $user->update();
            $msg = 'Data Updated Successfully.';
            return response()->json($msg);

        }

        //*** GET Request
        public function edit($id)
        {
            $data = User::findOrFail($id);
            return view('admin.user.edit',compact('data'));
        }

        //*** POST Request
        public function update(Request $request, $id)
        {
            //--- Validation Section
            $rules = [
                   'photo' => 'mimes:jpeg,jpg,png,svg',
                    ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
              return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends

            $user = User::findOrFail($id);
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

        public function withdraws(){
            return view('admin.user.withdraws');
          }

          public function withdrawdatatables()
          {
               $datas = Withdraw::get();
               //--- Integrating This Collection Into Datatables
               return Datatables::of($datas)
                                  ->addColumn('email', function(Withdraw $data) {
                                      $email = $data->user->email;
                                      return $email;
                                  })
                                  ->addColumn('phone', function(Withdraw $data) {
                                    $phone = $data->user->phone;
                                    return $phone;
                                })
                                ->editColumn('status', function(Withdraw $data) {
                                    $status = ucfirst($data->status);
                                    return $status;
                                })

                                  ->editColumn('amount', function(Withdraw $data) {
                                      $amount = $data->amount;
                                      return '$' . $amount;
                                  })
                                  ->editColumn('created_at', function(Withdraw $data) {
                                    $date = $data->created_at->diffForHumans();
                                    return $date;
                                })


                               ->addColumn('action', function(Withdraw $data) {

                                if($data->status == "pending") {
                                    $action = '<a href="javascript:;" data-href="' . route('admin-withdraw-accept',$data->id) . '"  class="dropdown-item" data-toggle="modal"  data-target="#status-modal">'.__("Accept").'</a>
                                    <a href="javascript:;" data-href="' . route('admin-withdraw-reject',$data->id) . '"  class="dropdown-item" data-toggle="modal" data-target="#confirm-delete">'.__("Reject").'</a>
                                ';
                                }
                                return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="javascript:;" data-href="' . route('admin.withdraw.show',$data->id) . '"  class="dropdown-item" id="applicationDetails" data-toggle="modal" data-target="#details">'.__("Details").'</a>'.$action.'

                                </div>
                              </div>';
                             })



                                  ->rawColumns(['name','email','amount','action'])
                                  ->toJson(); //--- Returning Json Data To Client Side
          }

           //*** GET Request
 public function withdrawdetails($id)
 {

     $withdraw = Withdraw::findOrFail($id);
     return view('admin.user.withdraw-details',compact('withdraw'));
 }

 //*** GET Request
 public function accept($id)
 {
     $withdraw = Withdraw::findOrFail($id);
     $data['status'] = "completed";
     $withdraw->update($data);
     //--- Redirect Section
     $msg = __('Withdraw Accepted Successfully.');
     return response()->json($msg);
     //--- Redirect Section Ends
 }

 //*** GET Request
 public function reject($id)
 {
     $withdraw = Withdraw::findOrFail($id);
     $account = User::findOrFail($withdraw->user->id);
     $account->balance = $account->balance + $withdraw->amount + $withdraw->fee;
     $account->update();
     $data['status'] = "rejected";
     $withdraw->update($data);
     //--- Redirect Section
     $msg = __('Withdraw Rejected Successfully.');
     return response()->json($msg);
     //--- Redirect Section Ends
 }
 public function destroy($id)
		{
		$user = User::findOrFail($id);

        if(Rating::where('user_id',$user->id)->count() > 0)
        {
            foreach (Rating::where('user_id',$user->id)->get() as $gal) {
                $gal->delete();
            }
        }

        if($user->comments->count() > 0)
        {
            foreach ($user->comments as $comment) {
            if($comment->replies->count() > 0)
            {
                foreach ($comment->replies as $key) {
                    if($key->subreplies->count() > 0)
                    {
                        foreach ($key->subreplies as $key1) {
                            $key1->delete();
                        }
                    }
                    $key->delete();
                }
            }
                $comment->delete();
            }
        }

            if($user->replies->count() > 0)
            {
                foreach ($user->replies as $reply) {
                    if($reply->subreplies->count() > 0)
                    {
                        foreach ($reply->subreplies as $key) {
                            $key->delete();
                        }
                    }
                    $reply->delete();
                }
            }


        if(Wishlist::where('user_id',$user->id)->count() > 0)
        {
            foreach (Wishlist::where('user_id',$user->id)->get() as $wishlist) {
                $wishlist->delete();
            }
        }

        if(Withdraw::where('user_id',$user->id)->count() > 0)
        {
            foreach (Withdraw::where('user_id',$user->id) as $gal) {
                $gal->delete();
            }
        }

        if($user->items->count()>0){
            foreach($user->items as $item){

                $item->delete();
            }
        }


        if(Order::where('user_id',$user->id)->count()>0){
            foreach(Order::where('user_id',$user->id)->get() as $order){
                OrderedItem::where('order_id',$order->id)->delete();
                $order->delete();
            }


        }
        if(OrderedItem::where('author_id',$user->id)->count()>0){
            foreach(OrderedItem::where('author_id',$user->id)->get() as $orderitem){
                Order::where('id',$orderitem->order_id)->delete();
                $orderitem->delete();
            }
        }

        if(Follow::where('follower_id',$user->id)->count()>0){
            Follow::where('follower_id',$user->id)->delete();
        }
        if(Follow::where('following_id',$user->id)->count()>0){
            Follow::where('following_id',$user->id)->delete();
        }



		    //If Photo Doesn't Exist
		    if($user->photo == null){
		        $user->delete();
			    //--- Redirect Section
			    $msg = 'Data Deleted Successfully.';
			    return response()->json($msg);
			    //--- Redirect Section Ends
		    }
		    //If Photo Exist
		    if (file_exists(public_path().'/assets/images/users/'.$user->photo)) {
		            unlink(public_path().'/assets/images/users/'.$user->photo);
		         }
		    $user->delete();
		    //--- Redirect Section
		    $msg = 'Data Deleted Successfully.';
		    return response()->json($msg);
		    //--- Redirect Section Ends
		}

}
