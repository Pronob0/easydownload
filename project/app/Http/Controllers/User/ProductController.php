<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Item;
use App\Models\Subcategory;
use Carbon\Carbon;
use App\Models\Screenshot;
use App\Models\Wishlist;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function form(){
      $requestCat = request()->input('category');
      $category = Category::where('slug',$requestCat)->first();
      $subcategories = $category->subs()->get();

      if (Session::has('currency'))
      {
          $curr = Currency::find(Session::get('currency'));
      }
      else
      {
          $curr = Currency::where('is_default','=',1)->first();
      }

      return view('user.product.create',compact('category','subcategories','curr'));
    }

    public function store(Request $request){



        $category = Category::find($request->category);
        $messages = [
          'main_filename.required' => 'Main file is required',
          'main_filename.mimes' => 'Main file should be zip file',
          'thumbnail_imagename.required' => 'Thumbnail is required',
        ];

        //--- Validation Section

        if($request->access_status==1){
            $rules = [
                'name' => 'required|max:100',
                'description' => 'required',
                'main_filename' => 'required|mimes:zip',
                'thumbnail_imagename' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'demo_link'=>'required',
             ];

        }
        else{
            $rules = [
                'name' => 'required|max:100',
                'description' => 'required',
                'regular_price' => 'required|integer',
                'extended_price' => 'required|integer',
                'main_filename' => 'required|mimes:zip',
                'thumbnail_imagename' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'demo_link'=>'required',
             ];


        }


        $fields = $category->fields()->get();
        foreach ($fields as $key => $field) {
          if ($field->required == 1) {
            $rules["$field->name"] = 'required';
          }
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends


        $data = new Item();
        $input = $request->all();
         if (filter_var($request->demo_link, FILTER_VALIDATE_URL)) {
              $input['demo_link']=$request->demo_link;
        } else {
         return response()->json(array('errors' => 'URL not valid'));
        }

        $attributes = [];
        foreach ($category->fields as $key => $field) {
          $in_name = $field->name;
          if ($request["$in_name"]) {
            $attributes["$in_name"] = $request["$in_name"];
          }
        }
        $jsonAttributes = json_encode($attributes);
        $jsonAttributes = str_replace("\/","/",$jsonAttributes);

        $input['attributes'] = $jsonAttributes;

        $sign = Currency::where('is_default',1)->first();
        if($request->access_status==0){
            $input['regular_price'] = (($request->regular_price+$category->regular_buyer_fee)/$sign->value);
            $input['extended_price'] = (($request->extended_price+$category->extended_buyer_fee)/$sign->value);
        }
        else{
            $input['regular_price'] = 0;
            $input['extended_price'] =0;
        }

        $input['slug'] = Str::slug($request->name,'-').'-'.strtolower(Str::random(3).'item'.Str::random(3));
        $input['user_id'] = Auth::user()->id;
        $input['category_id'] = $category->id;
        $input['outcome'] = implode(',,,', $request->outcomes);
        $input['access_status']=$request->access_status;


        if ($file = $request->file('thumbnail_imagename'))
        {
           $name = time().str_replace(' ', '', $file->getClientOriginalName());
           $file->move('assets/images',$name);
           $input['thumbnail_imagename'] = $name;
        }

        if ($file = $request->file('preview_imagename'))
        {
           $name = time().str_replace(' ', '', $file->getClientOriginalName());
           $file->move('assets/images',$name);
           $input['preview_imagename'] = $name;
        }


        if ($request->hasFile('main_filename')) {
            $mainfile = $request->file('main_filename');
            $mainfilename = uniqid() . '.' . $mainfile->getClientOriginalExtension();
            $mainfile = $request->file('main_filename')->move('assets/files/', $mainfilename);
            $input['main_filename'] = $mainfilename;

        }




        $input['sell'] = 0;

        $input['approval_date'] = Carbon::now();

        unset($input['preview_screenshots_filename']);

        $data->fill($input)->save();


         $lastid = $data->id;

          if($files=$request->file('preview_screenshots_filename')){
            foreach($files as $file){
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/images/screenshot',$name);
                $gallery = new Screenshot();
                $gallery['photo'] = $name;
                $gallery['item_id'] = $lastid;
                $gallery->save();
            }
        }


        //--- Redirect Section
        $msg = 'New Item Added Successfully';
        return response()->json($msg);
        //--- Redirect Section Ends
        // .<a href="'.route('admin.product.index').'">View Product Lists.</a>
    }



    public function edit($id){
        $data = Item::findOrFail($id);
        $data['sign'] = Currency::where('is_default','=',1)->first();
        $category = Category::findOrFail($data->category_id);
        $data['attributes'] = json_decode($data->attributes,true);
        $data['subcategories'] = $category->subs()->get();
        $data['data'] = $data;
        $data['category'] = $category;

        if (Session::has('currency'))
        {
            $data['curr'] = Currency::find(Session::get('currency'));
        }
        else
        {
          $data['curr'] = Currency::where('is_default','=',1)->first();
        }

      return view('user.product.edit',$data);
    }

    public function update(Request $request,$id){
        $category = Category::find($request->category);



        $messages = [

        ];


        //--- Validation Section
        if(!$request->access_status){
            $rules = [
                'regular_price' => 'required|integer',
                'extended_price' => 'required|integer',
                'name' => 'required|max:100',
                'description' => 'required',
                'main_filename' => 'mimes:zip',
                'thumbnail_imagename' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                 'demo_link'=>'required',
             ];

        }
        else{
            $rules = [
                'name' => 'required|max:100',
                'description' => 'required',
                'main_filename' => 'mimes:zip',
                'thumbnail_imagename' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'demo_link'=>'required',
             ];

        }


        $fields = $category->fields()->get();
        foreach ($fields as $key => $field) {
          if ($field->required == 1) {
            $rules["$field->name"] = 'required';
          }
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $data = Item::findOrFail($id);
        $input = $request->all();
         if (filter_var($request->demo_link, FILTER_VALIDATE_URL)) {
              $input['demo_link']=$request->demo_link;
        } else {
         $msg = 'URL is not valid';
         return response()->json($msg);
        }

        if(count($category->fields) != 0){
          foreach ($category->fields as $key => $field) {
            $in_name = $field->name;
            if ($request["$in_name"]) {
              $attributes["$in_name"] = $request["$in_name"];
            }
          }
        }else{
          $attributes = [];
        }

        $jsonAttributes = json_encode($attributes);
        $jsonAttributes = str_replace("\/","/",$jsonAttributes);

        $input['attributes'] = $jsonAttributes;

        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
          $curr = Currency::where('is_default','=',1)->first();
        }

        $input['regular_price'] = ($request->regular_price+$category->regular_buyer_fee);
        $input['extended_price'] = ($request->extended_price+$category->extended_buyer_fee);

        $input['slug'] = Str::slug($request->name,'-').'-'.strtolower(Str::random(3).'item'.Str::random(3));
        $input['user_id'] = Auth::user()->id;
        $input['category_id'] = $category->id;
        $input['outcome'] = implode(',,,', $request->outcomes);
        if($request->access_status==null){
            $input['access_status']=0;
        }else{
            $input['access_status']=1;
        }


        if($request->hasFile('thumbnail_imagename') || $request->hasFile('preview_imagename') || $request->hasFile('main_filename') || $request->hasFile('preview_screenshots_filename')){

            // thumbnail_image
            if ($request->hasFile('thumbnail_imagename'))
        {
          $file = $request->file('thumbnail_imagename');
           $name = time().str_replace(' ', '', $file->getClientOriginalName());
           $file->move('assets/images',$name);
           $input['temp_thumbnail_image'] = $name;
        }
        else{
            $input['temp_thumbnail_image'] = $data->thumbnail_imagename;
        }

        //preview_image
        if ($request->hasFile('preview_imagename'))
        {
            $file = $request->file('preview_imagename');
            $name = time().str_replace(' ', '', $file->getClientOriginalName());

           $file->move('assets/images',$name);
           $input['temp_preview_image'] = $name;
        }
        else{
            $input['temp_preview_image'] = $data->preview_imagename;
        }

        if ($request->hasFile('main_filename')) {

            $input['temp_mainfile'] = $data->main_filename;
            $mainfile = $request->file('main_filename')->move('assets/files/tmp/', $data->main_filename);
        }
        else{
            $input['temp_mainfile'] = $data->main_filename;


        }
        if ($request->preview_screenshots_filename) {
            $files=$request->preview_screenshots_filename;
            $gallery = new Screenshot();

            foreach($files as $file){
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/images/screenshot',$name);
                $gallery->item_id = $id;
                $gallery->photo = $name;
                $gallery->save();
            }

          }

          $input['Resubmission']=1;
          $input['comment']=NULL;
          $input['temp_status']='pending';


        }



        $input['main_filename']=$data->main_filename;
        $input['sell'] = 0;
        $data->update($input);
        //--- Redirect Section
        $msg = 'Data Updated Successfully';
        return response()->json($msg);
        //--- Redirect Section Ends
      }

      public function feature($id){

       Item::findOrFail($id)->update(['is_feature'=>1]);
       foreach(Item::where('id','!=',$id)->where('user_id',Auth::user()->id)->get() as $as){
        $as->update(['is_feature'=>0]);
       }
       return back();

      }

      //*** GET Request
      public function load($id)
      {
        $subcat = Subcategory::findOrFail($id);
        return view('load.childcategory',compact('subcat'));
      }


     public function screensortRemove($id){
        $data = Screenshot::findOrFail($id);
        @unlink('assets/images/screenshot/'.$data->photo);
        $data->delete();
        return back();
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
        Toastr::success('message', $msg);
        return redirect()->back();
    }

}
