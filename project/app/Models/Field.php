<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'type', 'label', 'name', 'placeholder', 'note', 'required']; 
    
    
    public function category() {
        return $this->belongsTo('App\Models\Category');
      }
  
    public function options() {
        return $this->hasMany('App\Models\Option');
      }
}
