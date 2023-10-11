<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Validator;

class ChildCategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Childcategory::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('category', function(Childcategory $data) {
                                return $data->subcategory->category->name;
                            })
                            ->addColumn('subcategory', function(Childcategory $data) {
                                return $data->subcategory->name;
                            })
                            ->addColumn('action', function(Childcategory $data) {
                                return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.childcat.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.childcat.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';
                            })

                            ->rawColumns(['attributes','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }



    //*** GET Request
    public function index()
    {
        return view('admin.childcategory.index');
    }

    //*** GET Request
    public function create()
    {
      	$cats = Category::all();
        return view('admin.childcategory.create',compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:childcategories|regex:/^[a-zA-Z0-9\s-]+$/'
        ];
        $customs = [
            'category_id.required' => 'Category field is required',
            'subcategory_id.required' => 'Sub Category field is required',
            'name.required' => 'Name field is required',
            'slug.required' => 'Slug field is required',
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
          ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Childcategory();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends
        cache()->forget('categories');
        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
    	$cats = Category::all();
        $subcats = Subcategory::all();
        $data = Childcategory::findOrFail($id);
        return view('admin.childcategory.edit',compact('data','cats','subcats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
          'category_id' => 'required',
          'subcategory_id' => 'required',
          'name' => 'required',
          'slug' => 'required|unique:childcategories,slug,'.$id
        ];

        $customs = [
            'category_id.required' => 'Category field is required',
            'subcategory_id.required' => 'Sub Category field is required',
            'name.required' => 'Name field is required',
            'slug.required' => 'Slug field is required',
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
        ];


        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends


        //--- Logic Section
        $data = Childcategory::findOrFail($id);

        $input = $request->all();

        $input['slug'] = Str::slug($request->slug, '-');

        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Status
    public function status($id1,$id2)
    {
      $data = Childcategory::findOrFail($id1);
      $data->status = $id2;
      $data->update();
      cache()->forget('categories');
    }

    //*** GET Request
    public function load($id)
    {
      $subcat = Subcategory::findOrFail($id);
      return view('load.childcategory',compact('subcat'));
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Childcategory::findOrFail($id);

        if($data->products->count()>0)
        {
          //--- Redirect Section
          $msg = 'Remove the products first !';
          return response()->json($msg);
          //--- Redirect Section Ends
        }

        $data->delete();

        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
