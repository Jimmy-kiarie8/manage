<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function manage(){
		return $this->belongsTo('App\Manage');
    }
}
