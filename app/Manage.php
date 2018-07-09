<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;

class Manage extends Model
{
	// use HasRoles;

 //   protected $guard_name = 'web'; // or whatever guard you want to use

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function admins()
    {
        return $this->hasMany('App\Admin');
    }

    public function reports(){
        return $this->hasMany('App\Report');
    }

    public function events(){
        return $this->hasMany('App\Event');
    }

    public function surveys(){
        return $this->hasMany('App\Survey');
    }
}
