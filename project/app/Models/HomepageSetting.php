<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    use HasFactory;

    protected $fillable = ['hero_bg','hero_photo','hero_title','hero_text','checkout_theme_title','checkout_theme_text','featured_theme_title','featured_theme_text','featured_theme_bg','blog_section_title','blog_section_text','newsletter_title','newsletter_text','newsletter_bg','newsletter_photo'];

    public $timestamps = false;
}
