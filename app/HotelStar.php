<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelStar extends Model
{
    protected $fillable = [
    'name', 'description'
  ];
   public function clientdetail()
    {
        return $this->hasMany('App\ClientDetail');
    }
}
