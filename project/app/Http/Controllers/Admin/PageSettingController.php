<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pagesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;


class PageSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    // Page Settings All post requests will be done in this method
    public function update(Request $request)
    {
            //--- Validation Section
            $rules = [
                'newsletter_photo'      => 'mimes:jpeg,jpg,png,svg',
                'hero_photo'      => 'mimes:jpeg,jpg,png,svg',
            ];

             $validator = Validator::make($request->all(), $rules);

             if ($validator->fails()) {
               return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
             }
             //--- Validation Section Ends

            $data = HomepageSetting::findOrFail(1);
            $input = $request->all();




            if ($file = $request->file('newsletter_photo'))
                {
                    $name = time().str_replace(' ', '', $file->getClientOriginalName());
                    $file->move('assets/images',$name);
                    @unlink('assets/images/'.$data->newsletter_photo);
                $input['newsletter_photo'] = $name;
                }
                if ($file = $request->file('hero_photo'))
                {
                    $name = time().str_replace(' ', '', $file->getClientOriginalName());
                    $file->move('assets/images',$name);
                    @unlink('assets/images/'.$data->hero_photo);
                $input['hero_photo'] = $name;
                }

            $data->update($input);
            $msg = 'Data Updated Successfully.';
            return response()->json($msg);
    }


    public function homeupdate(Request $request)
    {
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();

        if ($request->slider == ""){
            $input['slider'] = 0;
        }
        if ($request->service == ""){
            $input['service'] = 0;
        }
        if ($request->featured == ""){
            $input['featured'] = 0;
        }
        if ($request->small_banner == ""){
            $input['small_banner'] = 0;
        }
        if ($request->best == ""){
            $input['best'] = 0;
        }
        if ($request->top_rated == ""){
            $input['top_rated'] = 0;
        }
        if ($request->large_banner == ""){
            $input['large_banner'] = 0;
        }
        if ($request->big == ""){
            $input['big'] = 0;
        }
        if ($request->hot_sale == ""){
            $input['hot_sale'] = 0;
        }
        if ($request->review_blog == ""){
            $input['review_blog'] = 0;
        }
        if ($request->partners == ""){
            $input['partners'] = 0;
        }
        if ($request->bottom_small == ""){
            $input['bottom_small'] = 0;
        }
        if ($request->flash_deal == ""){
            $input['flash_deal'] = 0;
        }
        if ($request->featured_category == ""){
            $input['featured_category'] = 0;
        }
        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }


    public function contact()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.contact',compact('data'));
    }

    public function customize()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.customize',compact('data'));
    }

    public function best_seller()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.best_seller',compact('data'));
    }

    public function big_save()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.big_save',compact('data'));
    }

    public function herosection()
    {
        $ps = HomepageSetting::findOrFail(1);
        return view('admin.pagesetting.herosection',compact('ps'));
    }
    public function checkouttheme()
    {
        $ps = HomepageSetting::findOrFail(1);
        return view('admin.pagesetting.recent_theme_section',compact('ps'));
    }
    public function featuredtheme()
    {
        $ps = HomepageSetting::findOrFail(1);
        return view('admin.pagesetting.featured_theme_section',compact('ps'));
    }
    public function blogsection()
    {
        $ps = HomepageSetting::findOrFail(1);
        return view('admin.pagesetting.blog_section',compact('ps'));
    }
    public function newsletter()
    {
        $ps = HomepageSetting::findOrFail(1);
        return view('admin.pagesetting.newsletter_section',compact('ps'));
    }

    //Upadte About Page Section Settings

    //Upadte FAQ Page Section Settings
    public function faqupdate($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->f_status = $status;
        $page->update();
        Session::flash('success', 'FAQ Status Upated Successfully.');
        return redirect()->back();
    }

    public function contactup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->c_status = $status;
        $page->update();
        Session::flash('success', 'Contact Status Upated Successfully.');
        return redirect()->back();
    }

    //Upadte Contact Page Section Settings
    public function contactupdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }


}
