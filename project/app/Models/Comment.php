<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['item_id', 'user_id','text'];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function item()
    {
    	return $this->belongsTo('App\Models\Item');
    }

	public function replies()
	{
	     return $this->hasMany('App\Models\Reply');
	}
}
