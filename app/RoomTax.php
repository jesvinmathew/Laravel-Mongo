<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTax extends Model
{
    protected $fillable = [
    'client_details_id', 'hotel_room_id', 'tax_details_id'
  ];
  public function clientdetail(){
    	return $this->belongsTo('App\ClientDetail');
   }
   public function hotelRoom(){
    	return $this->belongsTo('App\HotelRoom');
   }
   public function taxDetail(){
    	return $this->belongsTo('App\TaxDetail');
   }
}
