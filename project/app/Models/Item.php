<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','category_id','subcategory_id','childcategory_id','attributes','name','slug','main_filename','thumbnail_imagename','preview_imagename','preview_screenshots_filename','description','demo_link','tags','regular_price','extended_price','status','is_feature','approval_date','outcome','Resubmission','temp_mainfile','temp_thumbnail_image','temp_preview_image','temp_screenshot','temp_status','comment','temp_comment','access_status'];


    public function category()
    {
        return $this->belongsTo('App\Models\Category')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }

    public function ordered_items() {
        return $this->hasMany('App\Models\OrderedItem');
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function showPrice() {
        $gs = Generalsetting::findOrFail(1);
        $price = $this->regular_price;

        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }

        $price = round(($price) * $curr->value,2);
        if($gs->currency_format == 0){
            return $curr->sign.$price;
        }
        else{
            return $price.$curr->sign;
        }
    }

    public function cartPrice($price){
        $gs = Generalsetting::findOrFail(1);
        $price = $price;

        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }

        $price = round(($price) * $curr->value,2);
        if($gs->currency_format == 0){
            return $curr->sign.$price;
        }
        else{
            return $price.$curr->sign;
        }
    }


    public function showExtendedPrice() {
        $gs = Generalsetting::findOrFail(1);
        $price = $this->extended_price;

        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }


        $price = round(($price) * $curr->value,2);
        if($gs->currency_format == 0){
            return $curr->sign.$price;
        }
        else{
            return $price.$curr->sign;
        }
    }
    public function comments() {
        return $this->hasMany('App\Models\Comment');
      }
      public function screenshots() {
        return $this->hasMany('App\Models\Screenshot');
      }
}
