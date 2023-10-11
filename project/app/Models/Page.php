<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'details','meta_tag','meta_description','register_id','preloaded'];
    public $timestamps = false;

   
}
