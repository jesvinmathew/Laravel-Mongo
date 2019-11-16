<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    protected $fillable = [
    'name'
  ];
  public function taxDetail(){
    	return $this->hasMany('App\TaxDetail');
   }
}
