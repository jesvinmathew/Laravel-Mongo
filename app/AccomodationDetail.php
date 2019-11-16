<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomodationDetail extends Model
{
    protected $fillable = [
        'day', 'hotel_name','room_type', 'description', 'package_id'
    ];
    
    public function package(){
        return $this->belongsTo('App\Package');
    }
}
