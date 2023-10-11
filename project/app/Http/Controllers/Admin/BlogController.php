<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog_Category;
use Illuminate\Support\Str;
use Validator;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Blog::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(Blog $data) {
                                $photo = $data->photo ? url('assets/images/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })

                            ->addColumn('action', function(Blog $data) {

                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.blog.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.blog.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';

                            })
                            ->rawColumns(['photo','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.blog.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Blog_Category::all();
        return view('admin.blog.create',compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
               'photo'      => 'required|mimes:jpeg,jpg,png,svg',
               'title'=>'required',
               'slug'=>'required|unique:blogs|max:255'
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Blog();
        $input = $request->all();
        if ($file = $request->file('photo'))
         {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images',$name);
            $input['photo'] = $name;
        }


         // ------------------------TagFormat--------------------------//
            $input['slug']=Str::slug($request->slug);
            $common_rep   = ["value", "{", "}", "[","]",":","\""];
            $tag = str_replace($common_rep, '', $request->tags);
            $metatag = str_replace($common_rep, '', $request->meta_tag);



        if (!empty($metatag))
        {
            $input['meta_tag'] = $metatag;
        }


        if (!empty($tag))
         {
            $input['tags'] = $tag;
         }
        if ($request->secheck == "")
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
         $input['views'] = 0;
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin.blog.index").'">View Post Lists</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $cats = Blog_Category::all();
        $data = Blog::findOrFail($id);
        return view('admin.blog.edit',compact('data','cats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
               'photo'      => 'mimes:jpeg,jpg,png,svg',
               'title'=>'required',
               'slug' => 'required|unique:blogs,slug,'.$id,
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Blog::findOrFail($id);
        $input = $request->all();

            if ($file = $request->file('photo'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/images',$name);
                @unlink('assets/images/'.$data->photo);
            $input['photo'] = $name;
            }
            $common_rep   = ["value", "{", "}", "[","]",":","\""];
            $tag = str_replace($common_rep, '', $request->tags);
            $metatag = str_replace($common_rep, '', $request->meta_tag);



        if (!empty($metatag))
        {
            $input['meta_tag'] = $metatag;
        }
        if (!empty($tag))
         {
            $input['tags'] = $tag;
         }
        if ($request->secheck == "")
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
         $input['slug']=Str::slug($request->slug);

        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin.blog.index").'">View Post Lists</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        //If Photo Doesn't Exist
        @unlink('assets/images/'.$data->photo);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
