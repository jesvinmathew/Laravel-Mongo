<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelFoodPlan extends Model
{
    protected $fillable = [
    'client_detail_id', 'food_plan_id', 'rate'
  ];
  public function clientdetail(){
    	return $this->belongsTo('App\ClientDetail');
   }
   public function foodPlan(){
    	return $this->belongsTo('App\FoodPlan');
   }
}
