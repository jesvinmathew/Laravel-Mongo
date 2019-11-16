<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    protected $fillable = [
        'package_destination_id', 'caption','name'
    ];
    
    public function packageDestination(){
        return $this->belongsTo('App\PackageDestination');
    }
}
