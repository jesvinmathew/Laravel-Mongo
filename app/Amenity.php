<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
      'id', 'name', 'description', 'status'
    ];
    public function room(){
        return $this->hasMany('App\Room');
    }
}
