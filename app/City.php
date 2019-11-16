<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $fillable = [
    'district_id','name', 'code'
  ];
    public function district()
    {
    	return $this->belongsTo('App\District');
    }
     public function hoteldetail()
    {
        return $this->hasMany('App\HotelDetail');
    }
}
