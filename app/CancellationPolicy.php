<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancellationPolicy extends Model
{
   protected $fillable = [
    'name', 'description', 'status'
  ];
   public function hoteldetail()
    {
        return $this->hasMany('App\HotelDetail');
    }
}
