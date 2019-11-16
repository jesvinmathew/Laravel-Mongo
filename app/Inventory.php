<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'date','avail_rooms','bkd_rooms','rate','client_details_id', 'room_id'
    ];
}
