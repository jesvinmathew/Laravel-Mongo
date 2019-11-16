<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientMaster extends Model
{
    protected $fillable = [
    'user_id','name', 'status'
  ];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
     public function clientdetail()
    {
        return $this->hasMany('App\ClientDetail');
    }
}
