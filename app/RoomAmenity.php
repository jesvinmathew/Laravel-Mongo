<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomAmenity extends Model
{
    protected $fillable = [
    'hotel_room_id', 'amenity_id', 'status'
  ];
  public function hotelroom() {
  	return $this->belongsTo('App\HotelRoom');
  }
  public function amenity() {
  	return $this->belongsTo('App\Amenity');
  }
}
