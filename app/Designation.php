<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
    'name', 'description', 'status'
  ];
  public function clientContact(){
    	return $this->hasMany('App\ClientContact');
    }
     public function clientdetail()
    {
        return $this->hasMany('App\ClientDetail');
    }
}
