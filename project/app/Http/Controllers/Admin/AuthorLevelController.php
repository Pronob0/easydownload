<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorLevel;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Validator;

class AuthorLevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
         $datas = AuthorLevel::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
            return Datatables::of($datas)

            ->editColumn('icon', function(AuthorLevel $data) {
                $photo = $data->icon ? url('assets/images/'.$data->icon):url('assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })

            ->addColumn('status', function(AuthorLevel $data) {
                $status      = $data->status == 1 ? __('Activated') : __('Deactivated');
                $status_sign = $data->status == 1 ? 'success'   : 'danger';

                return '<div class="btn-group mb-1">
                <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  '.$status .'
                </button>
                <div class="dropdown-menu" x-placement="bottom-start">
                  <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.level.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Activate").'</a>
                  <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.level.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deactivate").'</a>
                </div>
              </div>';

            })


              ->editColumn('rate', function(AuthorLevel $data) {
                  return $data->rate.' %';

              })

              ->editColumn('amount', function(AuthorLevel $data) {
                  return '$'.$data->amount;
              })
            ->addColumn('action', function(AuthorLevel $data) {

              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.level.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.level.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';
            })
             ->rawColumns(['icon','status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }



    public function index()
    {
        return view('admin.author-level.index');
    }

    public function create()
    {

        return view('admin.author-level.create');
    }


    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name'=>'required',
            'icon'      => 'required|mimes:jpeg,jpg,png,svg,webp',
            'rate'=>'required',
            'amount'=>'required|unique:author_levels',
          ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new AuthorLevel();
        $input = $request->all();
        if ($file = $request->file('icon'))
         {
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images',$name);
            $input['icon'] = $name;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin.level.index").'">View Post Lists</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function edit($id)
    {
      $data = AuthorLevel::findOrFail($id);
      return view('admin.author-level.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'name'=>'required',
            'icon'      => 'mimes:jpeg,jpg,png,svg,webp',
            'rate'=>'required',
            'amount'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = AuthorLevel::findOrFail($id);
        $input = $request->all();

            if ($file = $request->file('icon'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/images',$name);
                @unlink('assets/images/'.$data->icon);
            $input['icon'] = $name;
            }


        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin.level.index").'">View Post Lists</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }


    public function status($id1,$id2)
    {
        $data = AuthorLevel::findOrFail($id1);
        $data->status = $id2;
        $data->update();

       //--- Redirect Section
       $msg = 'Data Updated Successfully.';
       return response()->json($msg);
       //--- Redirect Section Ends
    }

    public function destroy($id)
    {
        $data = AuthorLevel::findOrFail($id);
        //If Photo Doesn't Exist
        @unlink('assets/images/'.$data->icon);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }



}
