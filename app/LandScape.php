<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandScape extends Model
{
    protected $fillable = [
    'name', 'description', 'status'
  ];
  public function hotellandscape(){
        return $this->hasMany('App\HotelLndScape');
    }
}
