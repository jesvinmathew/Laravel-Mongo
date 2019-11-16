<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
    'state_id','name', 'code'
  ];
   public function state()
    {
    	return $this->belongsTo('App\State');
    }
    public function city()
    {
        return $this->hasMany('App\City');
    }
    public function clientdetail()
    {
        return $this->hasMany('App\ClientDetail');
    }
}
