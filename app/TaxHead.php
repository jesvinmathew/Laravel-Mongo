<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxHead extends Model
{
    protected $fillable = [
    'country_id','name'
  ];
  public function country(){
    	return $this->belongsTo('App\Country');
    }
  public function taxDetail(){
      return $this->hasMany('App\TaxDetail');
  }
}
