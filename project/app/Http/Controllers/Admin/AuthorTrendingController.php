<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderedItem;
use App\Models\Trending;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class AuthorTrendingController extends Controller
{
    public function index()
    {
        $trend=Trending::first();
        return view('admin.author-trending.index',compact('trend'));
    }


    public function update(Request $request)
    {

        //--- Validation Section
        $rules = [
            'name'=>'required',
            'icon'      => 'mimes:jpeg,jpg,png,svg,webp',
            'day'=>'required',
            'sell'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Trending::first();
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
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function status($id)
        {

            $data = Trending::first();
            $data->status = $id;
            $data->update();
            //--- Redirect Section
            $msg = __('Status Updated Successfully.');
            return response()->json($msg);
            //--- Redirect Section Ends
        }
}
