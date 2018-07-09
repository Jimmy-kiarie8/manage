<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csvfile extends Model
{
    protected $fillable = [
      'number',
      'name',
      'id_number',
      'mobile_number',
      'email',
      'shares',
      'divided_balance'
    ];
}
