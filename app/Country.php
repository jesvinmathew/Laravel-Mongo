<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   protected $fillable = [
    'name', 'code', 'telephone_code' , 'status'
  ];
  public function state()
    {
        return $this->hasMany('App\State');
    }
     public function clientdetail()
    {
        return $this->hasMany('App\ClientDetail');
    }
     public function taxhead()
    {
        return $this->hasMany('App\TaxHead');
    }

}
