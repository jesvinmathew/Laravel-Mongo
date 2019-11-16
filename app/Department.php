<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
    'name', 'description', 'status'
  ];
   public function clientcontact(){
    	return $this->hasMany('App\ClientContact');
    }
}
