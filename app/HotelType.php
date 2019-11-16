<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelType extends Model
{
   protected $fillable = [
    'name', 'description', 'status'
  ];
   public function clientdetail()
    {
        return $this->hasMany('App\ClientDetail');
    }
}
