<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Subcategory::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('category', function(Subcategory $data) {
                                return $data->category->name;
                            })
                            ->addColumn('status', function(Subcategory $data) {
                                $status      = $data->status == 1 ? __('Activated') : __('Deactivated');
                                $status_sign = $data->status == 1 ? 'success'   : 'danger';

                                return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.$status .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.subcat.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Activate").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.subcat.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deactivate").'</a>
                                </div>
                              </div>';

                            })

                            ->addColumn('action', function(Subcategory $data) {

                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.subcat.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.subcat.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';
                            })

                            ->rawColumns(['status','attributes','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.subcategory.index');
    }

    //*** GET Request
    public function create()
    {
      	$cats = Category::all();
        return view('admin.subcategory.create',compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'unique:subcategories|required|regex:/^[a-zA-Z0-9\s-]+$/'
        ];

        $customs = [
            'category_id.required' => 'Category required',
            'name.required' => 'Name feild is required',
            'slug.unique' => 'This slug has already been taken.',
            'slug.required' => 'Slug is required',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
        ];

        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Subcategory();
        $input = $request->all();
        $input['slug'] = Str::slug($request->slug, '-');
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
    	  $cats = Category::all();
        $data = Subcategory::findOrFail($id);
        return view('admin.subcategory.edit',compact('data','cats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
          'category_id' => 'required',
          'name' => 'required',
          'slug' => 'required|unique:subcategories,slug,'.$id
        ];

        $customs = [
          'category_id.required' => 'Category required',
          'name.required' => 'Name feild is required',
          'slug.unique' => 'This slug has already been taken.',
          'slug.required' => 'Slug is required'
        ];

        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends


        //--- Logic Section
        $data = Subcategory::findOrFail($id);
        $input = $request->all();
        $input['slug'] = Str::slug($request->slug, '-');

        $data->update($input);
        //--- Logic Section Ends


        cache()->forget('categories');
        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Status
    public function status($id1,$id2)
    {
        $data = Subcategory::findOrFail($id1);
        $data->status = $id2;
        $data->update();
        cache()->forget('categories');

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function load($id)
    {
        $cat = Category::findOrFail($id);
        return view('load.subcategory',compact('cat'));
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Subcategory::findOrFail($id);

        if($data->childs->count()>0)
        {
          //--- Redirect Section
          $msg = 'Remove the Child Categories first !';
          return response()->json($msg);
          //--- Redirect Section Ends
        }

        if($data->products->count()>0)
        {
          //--- Redirect Section
          $msg = 'Remove the products first !';
          return response()->json($msg);
          //--- Redirect Section Ends
        }


        $data->delete();
        cache()->forget('categories');
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
