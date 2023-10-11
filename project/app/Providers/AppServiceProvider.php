<?php

namespace App\Providers;

use App\Models\Font;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        view()->composer('*',function($settings){
            if (!empty(session()->get('cart'))) {
                $settings->with('cartLength', count(session()->get('cart')));
            } else {
                $settings->with('cartLength', 0);
            }

            $settings->with('gs', DB::table('generalsettings')->find(1));
            $settings->with('default_font', Font::where('is_default','=',1)->first());
            $settings->with('homepage', DB::table('homepage_settings')->find(1));
            $settings->with('sc', DB::table('socialsettings')->find(1));
            $settings->with('visited', 1);

            // favourite
            if(Auth::user()){
                $settings->with('favouriteLength', DB::table('wishlists')->where('user_id',Auth::user()->id)->count());
            }




            //lANGUAGE uPDATE
            if (\Request::is('admin') || \Request::is('admin/*')) {
                $data = DB::table('admin_languages')->where('is_default','=',1)->first();
                App::setlocale($data->name);
            }
            else {

                if (Session::has('language')) {
                    $data = DB::table('languages')->find(Session::get('language'));

                    App::setlocale($data->name);
                }
                else {
                    $data = DB::table('languages')->where('is_default','=',1)->first();
                    App::setlocale($data->name);
                }
            }

        });
        Paginator::useBootstrap();


        Validator::extend('google_captcha', function ($attribute, $value, $parameters, $validator){

            $http=Http::asForm()->post(config('google_captcha.gc_verification_url'),[
                'secret' => config('google_captcha.secret_key'),
                'response' =>$value,
            ]);

            if(!$http->object()->success){

                $errorMessage=null;
                collect($http->object()->{"error-codes"})->each(function ($item)use(&$errorMessage){
                    $errorMessage.=config('google_captcha.error_codes')[$item];

                });

                $validator->addReplacer('google_captcha',
                    function($message, $attribute, $rule, $parameters) use ($errorMessage) {
                        return \str_replace(':message', $errorMessage, $message);
                    }
                );
            }

            return $http->object()->success;
        },":message");



    }




}

