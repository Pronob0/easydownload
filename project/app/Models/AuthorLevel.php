<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorLevel extends Model
{
    use HasFactory;

    protected $fillable = ['name','rate', 'amount','icon','status'];
    public $timestamps = false;
}
