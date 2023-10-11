<?php

namespace App\Http\Controllers\Admin;
use Datatables;
use App\Http\Controllers\Controller;
use App\Models\AuthorBadge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorBadgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
         $datas = AuthorBadge::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)

                            ->addColumn('status', function(AuthorBadge $data) {
                                $status      = $data->status == 1 ? __('Activated') : __('Deactivated');
                                $status_sign = $data->status == 1 ? 'success'   : 'danger';

                                return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                '.$status .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.badge.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Activate").'</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.badge.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deactivate").'</a>
                                </div>
                            </div>';

                            })
                            ->editColumn('icon', function(AuthorBadge $data) {
                                $photo = $data->icon ? url('assets/images/'.$data->icon):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })


                            ->addColumn('action', function(AuthorBadge $data) {
                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.badge.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.badge.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';



                            })
                            ->rawColumns(['icon','status', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.author-badge.index');
    }

    public function create()
    {

        return view('admin.author-badge.create');
    }

    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name'=>'required',
            'days'=>'required',
            'time'=>'required',
            'icon'      => 'required|mimes:jpeg,jpg,png,svg',

                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new AuthorBadge;
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
        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin.badge.index").'">View Post Lists</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function edit($id)
    {

        $data = AuthorBadge::findOrFail($id);
        return view('admin.author-badge.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'name'=>'required',
            'days'=>'required',
            'time'=>'required',
            'icon'      => 'mimes:jpeg,jpg,png,svg',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = AuthorBadge::findOrFail($id);
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
        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin.badge.index").'">View Post Lists</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function status($id1,$id2)
    {
        $data = AuthorBadge::findOrFail($id1);
        $data->status = $id2;
        $data->update();

       //--- Redirect Section
       $msg = 'Data Updated Successfully.';
       return response()->json($msg);
       //--- Redirect Section Ends
    }
    public function destroy($id)
    {
        $data = AuthorBadge::findOrFail($id);
        //If Photo Doesn't Exist
        @unlink('assets/images/'.$data->icon);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
