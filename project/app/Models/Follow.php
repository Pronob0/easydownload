<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id','follower_id'];
    protected $table    = 'follows';
    public $timestamps  = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User','follower_id',);
    }

    public function follower()
    {
        return $this->belongsTo('App\Models\User','following_id',);
    }
}

