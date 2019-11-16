<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelAttraction extends Model
{
    protected $fillable = [
    'client_details_id', 'name', 'description', 'status'
  ];
}
