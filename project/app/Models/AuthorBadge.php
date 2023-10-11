<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBadge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'days','time','icon','status'];
    public $timestamps = false;
}
