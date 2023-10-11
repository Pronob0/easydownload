<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','regular_buyer_fee','extended_buyer_fee','demo_url_status','photo','status','is_featured'];

    public function subs()
    {
    	return $this->hasMany('App\Models\Subcategory')->where('status','=',1);
    }
    
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '-', $value);
    }

    public function attributes() {
        return $this->morphMany('App\Models\Attribute', 'attributable');
    }

    public function fields() {
        return $this->hasMany('App\Models\Field');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Item')->where('status','completed');
    }

}
