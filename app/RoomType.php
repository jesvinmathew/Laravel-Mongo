<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
   protected $fillable = [
    'name', 'description', 'status'
  ];
  public function hotelRoom(){
        return $this->hasMany('App\HotelRoom');
    }
}
