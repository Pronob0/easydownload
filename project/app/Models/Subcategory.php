<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name','slug'];

    public function childs()
    {
    	return $this->hasMany('App\Models\Childcategory');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Category')->withDefault();
    }

    public function products()
    {
        return $this->hasMany('App\Models\Item')->where('status','completed');
    }
}
