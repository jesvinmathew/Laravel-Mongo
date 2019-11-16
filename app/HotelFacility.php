<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelFacility extends Model
{
    protected $fillable = [
    'client_detail_id', 'facility_id'
  ];
}
