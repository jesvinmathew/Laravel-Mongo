<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $fillable = [
    'country_id','name', 'code'
  ];
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }
     public function district()
    {
        return $this->hasMany('App\District');
    }
}
