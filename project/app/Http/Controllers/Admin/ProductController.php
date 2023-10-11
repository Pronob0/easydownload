<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Subcategory;
use App\Models\Generalsetting;
use App\Models\Item;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

        //*** JSON Request
        public function datatables($status)
        {

            if($status == 'pending'){
                $datas = Item::where('status','=','pending')->get();
            }

            elseif($status == 'completed') {
                $datas = Item::where('status','=','completed')->get();
            }
            elseif($status == 'declined') {
                $datas = Item::where('status','=','declined')->get();
            }
            else{
              $datas = Item::orderBy('id','desc')->get();
            }

             //--- Integrating This Collection Into Datatables
             return DataTables::of($datas)
                                ->editColumn('thumbnail_imagename', function(Item $data) {
                                        $photo = $data->thumbnail_imagename ? url('assets/images/'.$data->thumbnail_imagename):url('assets/images/noimage.png');
                                        return '<img style="max-width:70px" src="' . $photo . '" alt="Image">';
                                    })

                                ->editColumn('name', function(Item $data) {
                                    $name =  mb_strlen($data->name,'UTF-8') > 20 ? mb_substr($data->name,0,20,'UTF-8').'...' : $data->name;

                                    $author = $data->user_id != 0 ? User::findOrFail($data->user_id)->username : 'Admin';
                                  return $name.'<br>'.'<b>('.$author.')</b>';

                                })
                                ->editColumn('category_id', function(Item $data) {
                                    return $data->category->name;
                                  })

                                ->editColumn('regular_price', function(Item $data) {
                                    $sign = Currency::where('is_default','=',1)->first();
                                    $price = round($data->regular_price * $sign->value , 2);
                                    $price = $sign->sign.$price ;
                                    return  $price;
                                })

                                ->addColumn('MainFile',function(Item $data){

                                    $XXX = '<div class="actions-btn"> <form action="'. route('user.file') .'" method="POST">'.csrf_field().'<input type="hidden" name="file" value="'. $data->slug .'">
                                    <button type="submit"  class="btn btn-primary btn-sm btn-rounded"><i class="fa fa-download"></i></button>
                                </form></div>';
                                    return $XXX;

                                })
                                ->editColumn('demo_link',function(Item $data){
                                    return '<div class="actions-btn"><a href="' .$data->demo_link . '" class="btn btn-primary btn-sm btn-rounded" target="_blank"><i class="fas fa-arrow-up"></i> </a></div>';
                                  })
                                  ->addColumn('status', function(Item $data) {

                                    if($data->status=='pending'){
                                     $status= __('Pending');
                                    }

                                    elseif($data->status=='completed'){
                                        $status= __('Approved');
                                    }
                                    else{
                                        $status=__('Soft Reject');
                                    }

                                    if($data->status=='completed'){
                                        $status_sign='success';
                                    }
                                    elseif($data->status=='pending'){
                                        $status_sign='primary';
                                    }
                                    else{
                                        $status_sign='danger';
                                    }

                                    if($data->status!='completed'){
                                        return '<div class="btn-group mb-1">
                                        <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          '.$status .'
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                          <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.product.status',['id1' => $data->id, 'id2' => 'pending']).'">'.__("Pending").'</a>
                                          <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.product.status',['id1' => $data->id, 'id2' => 'completed']).'">'.__("Approved").'</a>

                                          <a class="decision dropdown-item" href="javascript:;" data-demo_status="' . $data->status . '" data-val="declined" data-itemid="' . $data->id . '">'.__('Soft Reject').'</a>
                                        </div>
                                      </div>';

                                    }
                                    else{
                                        return'<a href="javascript:;" class="btn btn-success"   data-href="'. route('admin.product.status',['id1' => $data->id, 'id2' => 'completed']).'">'.__("Approved").'</a>';
                                    }
                              })
                              ->addColumn('is_feature', function(Item $data) {

                                if($data->is_feature==0){
                                 $is_feature= 'Off';
                                }
                                else{
                                    $is_feature='On';
                                }
                                if($data->is_feature==1){
                                    $feature_sign='success';
                                }
                                else{
                                    $feature_sign='danger';
                                }
                                return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-'.$feature_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.$is_feature .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.product.feature',['id1' => $data->id, 'id2' => 1]).'">'.__("On").'</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.product.feature',['id1' => $data->id, 'id2' => 0]).'">'.__("Off").'</a>
                                </div>
                              </div>';

                            })

                          ->addColumn('action', function(Item $data) {

                          return '<div class="btn-group mb-1">
                          <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            '.'Actions' .'
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start">
                            <a href="' . route('admin.product.details',$data->id) . '"  class="dropdown-item">'.__("Details").'</a>
                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.product.delete',$data->id).'">'.__("Delete").'</a>
                          </div>
                        </div>';
                        })
                        ->rawColumns(['thumbnail_imagename','name','category_id','regular_price','demo_link','MainFile', 'status','is_feature', 'action'])
                        ->toJson(); //--- Returning Json Data To Client Side
        }
       public function resubmitdatatables($status)
        {
           if($status == 1){
             $datas = Item::where('Resubmission','=','1')->where('temp_status','=','pending')->get();
            }

                                    //--- Integrating This Collection Into Datatables
            return DataTables::of($datas)
                            ->editColumn('temp_thumbnail_image', function(Item $data) {
                                $photo = $data->temp_thumbnail_image ? url('assets/images/'.$data->temp_thumbnail_image):url('assets/images/noimage.png');
                                return '<img style="max-width:70px" src="' . $photo . '" alt="Image">';
                                })

                            ->editColumn('name', function(Item $data) {
                                $name =  mb_strlen($data->name,'UTF-8') > 50 ? mb_substr($data->name,0,50,'UTF-8').'...' : $data->name;
                                return  $name;
                                })
                            ->editColumn('category_id', function(Item $data) {
                                    return $data->category->name;
                                    })

                            ->editColumn('regular_price', function(Item $data) {
                                $sign = Currency::where('is_default','=',1)->first();
                                $price = round($data->regular_price * $sign->value , 2);
                                $price = $sign->sign.$price ;
                                return  $price;
                                })
                            ->editColumn('user_id',function(Item $data){
                                    $author = $data->user_id != 0 ? User::findOrFail($data->user_id)->name : 'Admin';
                                    return $author;
                                    })

                            ->addColumn('temp_mainfile',function(Item $data){
                                return '<div class="actions-btn"><a href="' .url('assets/files/'.$data->temp_mainfile) . '" class="btn btn-primary btn-sm btn-rounded" download><i class="fa fa-download"></i> </a></div>';
                                })
                            ->editColumn('demo_link',function(Item $data){
                                    return '<div class="actions-btn"><a href="' .$data->demo_link . '" class="btn btn-primary btn-sm btn-rounded" target="_blank"><i class="fas fa-arrow-up"></i></a></div>';
                                    })
                            ->addColumn('temp_status', function(Item $data) {

                                        if($data->temp_status=='pending'){
                                         $status= __('Pending');
                                        }

                                        elseif($data->temp_status=='completed'){
                                            $status= __('Approved');
                                        }
                                        else{
                                            $status=__('Soft Reject');
                                        }

                                        if($data->temp_status=='completed'){
                                            $status_sign='success';
                                        }
                                        elseif($data->temp_status=='pending'){
                                            $status_sign='primary';
                                        }
                                        else{
                                            $status_sign='danger';
                                        }

                                      return '<div class="btn-group mb-1">
                                      <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.$status .'
                                      </button>
                                      <div class="dropdown-menu" x-placement="bottom-start">
                                        <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.product.resubmit.status',['id1' => $data->id, 'id2' => 'pending']).'">'.__("Pending").'</a>
                                        <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.product.resubmit.status',['id1' => $data->id, 'id2' => 'completed']).'">'.__("Approved").'</a>

                                        <a class="decision dropdown-item" href="javascript:;" data-demo_status="' . $data->temp_status . '" data-val="declined" data-itemid="' . $data->id . '">'.__('Soft Reject').'</a>

                                      </div>
                                    </div>';
                                  })

                          ->addColumn('action', function(Item $data) {

                          return '<div class="btn-group mb-1">
                          <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            '.'Actions' .'
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start">
                            <a href="' . route('admin.product.details',$data->id) . '"  class="dropdown-item">'.__("Details").'</a>
                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.product.delete',$data->id).'">'.__("Delete").'</a>
                          </div>
                        </div>';


                        })
                        ->rawColumns(['temp_thumbnail_image','name','category_id','regular_price','demo_link','temp_mainfile', 'temp_status', 'action'])
                        ->toJson(); //--- Returning Json Data To Client Side
        }


    public function index()
    {
      return view('admin.product.index');
    }


    public function completed()
    {
      return view('admin.product.completed');
    }

    public function pending()
    {
      return view('admin.product.pending');
    }

    public function declined()
    {
      return view('admin.product.declined');
    }
    public function resubmission()
    {
      return view('admin.product.resubmission');
    }


    public function details($id){
        $data = Item::findOrFail($id);
        $data['sign'] = Currency::where('is_default','=',1)->first();

        $category = Category::findOrFail($data->category_id);
        $data['attributes'] = json_decode($data->attributes,true);
         $data['subcategories'] = Subcategory::where('id',$data->subcategory_id)->first();
        $data['data'] = $data;
        $data['category'] = $category;

      return view('admin.product.details',$data);
    }

    public function status($id1,$id2)
    {
        $item = Item::findOrFail($id1);
        if($id2=='completed'){
            $item->status='completed';
            $item->Resubmission=0;
            if($item->temp_mainfile!=NULL){
                $item->main_filename=$item->temp_mainfile;
            }

            $item->temp_mainfile=NULL;
            $item->temp_thumbnail_image=NULL;
            $item->temp_preview_image=Null;
            $item->temp_screenshot=NULL;
            $item->temp_status='pending';
            $item->comment=NULL;
            $item->temp_comment=NULL;

        }
        $item->update();

        $gs = Generalsetting::findOrFail(1);
        if($gs->is_smtp == 1)
        {
            $data = [
                    'to' => $item->user->email,
                    'subject' => 'Product status',
                    'body' => "Congratulations! Your Product <b>".$item->name."</b> is Approved.",
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        }
        else
        {
            $data = 0;
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            $mail = mail($item->user->email,'Product status',"Congratulations! Your Product<b> ".$item->name. "</b> is Approved.",$headers);
            if($mail) {
                $data = 1;
            }
        }


       //--- Redirect Section
       $msg = 'Data Updated Successfully.';
       return response()->json($msg);
       //--- Redirect Section Ends
    }

    public function resubmitstatus($id1,$id2)
    {
        $data = Item::findOrFail($id1);

        if($id2=='completed'){

            if($data->temp_thumbnail_image!=$data->thumbnail_imagename){
                if(file_exists('assets/images/'.$data->thumbnail_imagename)){
                        unlink('assets/images/'.$data->thumbnail_imagename);
                     }
            }
            if($data->temp_preview_image!=$data->preview_imagename){
                if(file_exists('assets/images/'.$data->preview_imagename)){
                        unlink('assets/images/'.$data->preview_imagename);
                     }
            }
            if($data->temp_screenshot!=$data->preview_screenshots_filename){
                if(file_exists('assets/images/'.$data->preview_screenshots_filename)){
                        unlink('assets/images/'.$data->preview_screenshots_filename);
                     }
            }
            if($data->temp_mainfile){
                if(file_exists('assets/files/'.$data->main_filename)){
                        unlink('assets/files/'.$data->main_filename);
                     }


           if(file_exists('assets/files/tmp/'.$data->temp_mainfile)){
               copy('assets/files/tmp/'.$data->temp_mainfile,'assets/files/'.$data->temp_mainfile);
                unlink('assets/files/tmp/'.$data->temp_mainfile);
         }

            }
            $data->status=$id2;
            $data->thumbnail_imagename=$data->temp_thumbnail_image;
            $data->preview_imagename=$data->temp_preview_image;
            $data->preview_screenshots_filename=$data->temp_screenshot;
            $data->main_filename=$data->temp_mainfile;
            $data->temp_thumbnail_image=NULL;
            $data->temp_preview_image=NULL;
            $data->temp_screenshot=NULL;
            $data->temp_mainfile=NULL;
            $data->Resubmission=0;
            $data->temp_comment=NULL;
        }

    $data->update();

       //--- Redirect Section
       $msg = 'Data Updated Successfully.';
       return response()->json($msg);
       //--- Redirect Section Ends
    }
    public function soft(Request $request){
        $item =Item::where('id',$request->itemid)->first();

        $rules = [
            'temp_comment' => 'required|max:100',
         ];
         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
           return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
         }

        $item->temp_comment=$request->temp_comment;
        $item->temp_status='declined';
        $item->save();
        $gs = Generalsetting::findOrFail(1);
        if($gs->is_smtp == 1)
        {
            $data = [
                    'to' => $item->user->email,
                    'subject' => 'Product status',
                    'body' => "Your Product<b> ".$item->name." </b>Got Soft Reject! Reason....<br>".$item->temp_comment,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        }
        else
        {
            $data = 0;
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            $mail = mail($item->user->email,"Your Product".$item->name."Got Soft Reject! Reason....<br>".$item->temp_comment,$headers);
            if($mail) {
                $data = 1;
            }
        }

        return response()->json(array('success' => 'Successfully Updated!'));
    }
    public function createsoft(Request $request){
        $item =Item::where('id',$request->itemid)->first();
        if($item->status!='completed'){
            $rules = [
                'comment' => 'required|max:100',
             ];
             $validator = Validator::make($request->all(), $rules);
             if ($validator->fails()) {
               return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
             }


            $item->comment=$request->comment;
            if($item->Resubmission==1){
                $item->temp_status='declined';
            }
            else{
                $item->status='declined';
            }

            $item->save();

            $gs = Generalsetting::findOrFail(1);
            if($gs->is_smtp == 1)
            {
                $data = [
                        'to' => $item->user->email,
                        'subject' => 'Product status',
                        'body' => "Your Product".$item->name."Got Soft Reject! Reason....<br>".$item->temp_comment,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);
            }
            else
            {
                $data = 0;
                $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
                $mail = mail($item->user->email,'Product status',"Your Product".$item->name."Got Soft Reject! Reason....<br>".$item->temp_comment,$headers);
                if($mail) {
                    $data = 1;
                }
            }

            return response()->json(array('success' => 'Successfully Updated!'));

        }

            return response()->json(array('success' => 'You Can not Update Approved Product'));

    }




    public function feature($id1,$id2)
    {
        $data = Item::findOrFail($id1);
        $data->is_feature = $id2;
        $data->update();

       //--- Redirect Section
       $msg = 'Data Updated Successfully.';
       return response()->json($msg);
       //--- Redirect Section Ends
    }

    public function destroy($id){
        $data = Item::findOrFail($id);
        @unlink('assets/images/'.$data->thumbnail_imagename);
        @unlink('assets/images/'.$data->preview_imagename);
        @unlink('assets/files/'.$data->main_filename);
        @unlink('assets/files/'.$data->preview_screenshots_filename);
        if(Session::has('cart')){
            Session::forget('cart');
        }
        Wishlist::where('item_id',$id)->delete();
        $data->delete();
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }

}
