<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
	// use HasRoles;

 //   protected $guard_name = 'web'; // or whatever guard you want to use

    public function manage(){
		return $this->belongsTo('App\Manage');
    }
}
