<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','username','photo','state','zip','residency','city','country','reset_token', 'address', 'phone', 'fax', 'email','password','affilate_code','verification_link','f_url','g_url','t_url','l_url','f_check','g_check','t_check','l_check','date','mail_sent','balance','is_author','dashboard_title','dashboard_details','dashboard_banner'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
    public function follows()
    {
        return $this->hasMany('App\Models\Follow');
    }
    public function comments() {
        return $this->hasMany('App\Models\Comment');
      }

      public function replies() {
        return $this->hasMany('App\Models\Reply');
      }
      public function transactions()
    {
        return $this->hasMany('App\Models\Transaction','user_id');
    }
}
