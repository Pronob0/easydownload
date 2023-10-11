<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    use HasFactory;
    protected $fillable = ['orderedItem_id', 'user_id', 'text','is_buyer','is_seller'];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }
}
