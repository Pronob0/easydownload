<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seotool extends Model
{
    use HasFactory;
    protected $fillable = ['google_analytics','meta_keys'];
    public $timestamps = false;
}
