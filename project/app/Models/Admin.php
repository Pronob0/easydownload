<?php

namespace App\Models;



use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role_id',
        'photo',

        'remember_token',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function IsSuper(){
        if ($this->id == 1) {
           return true;
        }
        return false;
    }
    public function staff_role(){
        return $this->belongsTo('App\Models\Role','role_id')->withDefault();
    }

    public function followers(){
        return $this->hasMany('App\Models\Follow');
    }
    public function role()
    {
    	return $this->belongsTo('App\Models\Role')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }
    public function sectionCheck($value){
        $sections = explode(" , ", $this->role->section);
        if (in_array($value, $sections)){
            return true;
        }else{
            return false;
        }
    }
}
