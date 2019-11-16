<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
  protected $fillable = [
    'user_id', 'contact_number', 'client_master_id'
  ];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
