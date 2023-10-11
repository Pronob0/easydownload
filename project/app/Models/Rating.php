<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','item_id','review','rating'];


    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public static function ratings($productid){
        $stars = Rating::where('item_id',$productid)->avg('rating');
        $ratings = number_format((float)$stars, 1, '.', '')*20;
        return $ratings;
    }
    public static function rating($productid){
        $stars = Rating::where('item_id',$productid)->avg('rating');
        $stars = number_format((float)$stars, 1, '.', '');
        return $stars;
    }
}
