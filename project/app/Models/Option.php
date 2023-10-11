<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['field_id', 'name'];

    public function field() {
      return $this->belongsTo('App\Models\Field');
    }
}
