<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'id', 'user_id','name', 'location', 'description', 'gstnum', 'address1', 'status_id'
    ];

    public function status(){
        return $this->belongsTo('App\Status');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
