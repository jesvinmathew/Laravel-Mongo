<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelMaster extends Model
{
	 protected $fillable = [
    'user_id','name', 'status'
  ];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
     public function hoteldetail()
    {
        return $this->hasMany('App\HotelDetail');
    }
}
