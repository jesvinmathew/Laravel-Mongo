<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodPlan extends Model
{
    protected $fillable = [
    'shortname', 'name', 'description', 'status'
  ];
}
