<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxDetail extends Model
{
   protected $fillable = [
    'tax_head_id', 'tax_name', 'rate', 'tax_type_id', 'statu' 
  ];
   public function roomTax(){
    	return $this->hasMany('App\RoomTax');
   }
   public function taxType(){
    	return $this->belongsTo('App\TaxType');
   }
}
