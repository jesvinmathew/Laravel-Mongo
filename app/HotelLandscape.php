<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelLandscape extends Model
{
    protected $fillable = [
    'client_details_id', 'land_scapes_id'
  ];
     public function clientdetail()
    {
        return $this->hasMany('App\ClientDetail');
    }
     public function landscape()
    {
        return $this->belongsTo('App\LandScape');
    }
}
