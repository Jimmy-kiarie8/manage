<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function manage(){
		return $this->belongsTo('App\Manage');
    }
}
