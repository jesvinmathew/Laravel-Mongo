<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable = [
    'client_details_id', 'room_type_id', 'room_name', 'rate', 'number_of_rooms', 'image',
    'extra_bed', 'max_room_capacity', 'max_extra_bed', 'infant_rate',
    'child_plan_amount', 'room_size', 'room_size_unit', 'room_description'
  ];
public function clientdetail(){
    	return $this->belongsTo('App\ClientDetail');
   }
    public function roomTax(){
        return $this->hasMany('App\RoomTax');
    }
    public function inventory(){
        return $this->belongsTo('App\Inventory');
    }
    public function roomType(){
        return $this->belongsTo('App\RoomType');
    }
     public function roomAmenity(){
        return $this->hasMany('App\RoomAmenity');
    }
}
