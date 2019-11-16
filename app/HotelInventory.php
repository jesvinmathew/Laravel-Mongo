<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelInventory extends Model
{
   protected $fillable = [
        'client_details_id', 'hotel_room_id', 'current_date', 'allowed_room_num', 'booked_room_num' 
    ];
}
