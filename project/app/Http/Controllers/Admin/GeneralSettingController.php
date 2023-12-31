<?php

namespace App\Http\Controllers\Admin;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;


class GeneralSettingController extends Controller
{

    protected $rules =
    [
        'logo'              => 'mimes:jpeg,jpg,png,svg',
        'favicon'           => 'mimes:jpeg,jpg,png,svg',
        'loader'            => 'mimes:gif',
        'admin_loader'      => 'mimes:gif',
        'affilate_banner'   => 'mimes:jpeg,jpg,png,svg',
        'error_banner'      => 'mimes:jpeg,jpg,png,svg',
        'popup_background'  => 'mimes:jpeg,jpg,png,svg',
        'invoice_logo'      => 'mimes:jpeg,jpg,png,svg',
        'breadcumb_banner'  => 'mimes:jpeg,jpg,png,svg',
        'footer_logo'       => 'mimes:jpeg,jpg,png,svg',
        'cert_sign'         => 'mimes:jpeg,jpg,png,svg',
        'footer'            =>'min:10',
        'copyright'         =>'min:10',
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    private function setEnv($key, $value,$prev)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . $prev,
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }
    public function ismaintain($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_maintain = $status;
        $data->update();

            //--- Redirect Section
       $msg = 'Data Updated Successfully.';
       return response()->json($msg);
    //    }else{
    //        return back()->withSuccess('Data Updated Successfully.');
    //    }
    //     cache()->forget('generalsettings');
    }

    // Genereal Settings All post requests will be done in this method
    public function generalupdate(Request $request)
    {
        //--- Validation Section
        $validator =Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        else {
        $input = $request->all();
        $data = Generalsetting::findOrFail(1);
            if ($file = $request->file('logo'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->logo);
                $input['logo'] = $name;
            }
            if ($file = $request->file('favicon'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->favicon);
                $input['favicon'] = $name;
            }
            if ($file = $request->file('loader'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->loader);
                $input['loader'] = $name;
            }
            if ($file = $request->file('admin_loader'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->admin_loader);
                $input['admin_loader'] = $name;
            }
            if ($file = $request->file('affilate_banner'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->affilate_banner);
                $input['affilate_banner'] = $name;
            }
             if ($file = $request->file('error_banner'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->error_banner);
                $input['error_banner'] = $name;
            }
            if ($file = $request->file('popup_background'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->popup_background);
                $input['popup_background'] = $name;
            }
            if ($file = $request->file('invoice_logo'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->invoice_logo);
                $input['invoice_logo'] = $name;
            }
            if ($file = $request->file('breadcumb_banner'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->breadcumb_banner);
                $input['breadcumb_banner'] = $name;
            }

            if ($file = $request->file('footer_logo'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->footer_logo);
                $input['footer_logo'] = $name;
            }

            if ($file = $request->file('cert_sign'))
            {
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $data->upload($name,$file,$data->cert_sign);
                $input['cert_sign'] = $name;
            }

        $data->update($input);
        //--- Logic Section Ends


        if($request->ajax()){
             //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        }else{
            return back()->withSuccess('Data Updated Successfully.');
        }



        //--- Redirect Section Ends
        }
    }

    public function generalupdatepayment(Request $request)
    {
        //--- Validation Section
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        else {
        $input = $request->all();
        $curr = Currency::where('is_default','=',1)->first();
        $data = Generalsetting::findOrFail(1);
        $prev = $data->molly_key;

        if ($request->vendor_ship_info == ""){
            $input['vendor_ship_info'] = 0;
        }

        if ($request->instamojo_sandbox == ""){
            $input['instamojo_sandbox'] = 0;
        }

        if ($request->paypal_mode == ""){
            $input['paypal_mode'] = 'live';
        }
        else {
            $input['paypal_mode'] = 'sandbox';
        }

        if ($request->paytm_mode == ""){
            $input['paytm_mode'] = 'live';
        }
        else {
            $input['paytm_mode'] = 'sandbox';
        }
        $input['fixed_commission'] = $input['fixed_commission'] / $curr->value;
        $data->update($input);


        $this->setEnv('MOLLIE_KEY',$data->molly_key,$prev);
        // Set Molly ENV

        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
        }
    }

    public function logo()
    {
        return view('admin.generalsetting.logo');
    }
    public function captcha()
    {
        return view('admin.generalsetting.captcha');
    }

    public function breadcumb()
    {
        return view('admin.generalsetting.breadcumb');
    }

    public function userimage()
    {
        return view('admin.generalsetting.user_image');
    }

    public function fav()
    {
        return view('admin.generalsetting.favicon');
    }

     public function load()
    {
        return view('admin.generalsetting.loader');
    }
    public function order()
    {
        return view('admin.generalsetting.order');
    }

     public function contents()
    {
        return view('admin.generalsetting.websitecontent');
    }

    public function theme()
    {
        return view('admin.generalsetting.theme');
    }

    public function productDetails()
    {
        return view('admin.generalsetting.product-details');
    }

     public function header()
    {
        return view('admin.generalsetting.header');
    }

     public function footer()
    {
        return view('admin.generalsetting.footer');
    }

    public function paymentsinfo()
    {
        $curr = Currency::where('is_default','=',1)->first();
        return view('admin.generalsetting.paymentsinfo',compact('curr'));
    }

    public function affilate()
    {
        return view('admin.generalsetting.affilate');
    }

    public function errorbanner()
    {
        return view('admin.generalsetting.error_banner');
    }

    public function popup()
    {
        return view('admin.generalsetting.popup');
    }


    public function maintain()
    {
        return view('admin.generalsetting.maintain');
    }

    // Status Change Method -> GET Request
    public function status($field,$value)
    {
        $prev = '';
        $data = Generalsetting::find(1);
        if($field == 'is_debug'){
            $prev = $data->is_debug == 1 ? 'true':'false';
        }
        $data[$field] = $value;
        $data->update();
        if($field == 'is_debug'){
            $now = $data->is_debug == 1 ? 'true':'false';
            $this->setEnv('APP_DEBUG',$now,$prev);
        }
        //--- Redirect Section
        $msg = __('Status Updated Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends

    }

}
