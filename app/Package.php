<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    'name', 'description', 'type', 'pickup_point', 'drop_point', 'agent_id', 'hotel_id', 'days', 'inclusions', 'exclusions', 'status'
    ];
    
    public function packageprice(){
        return $this->hasMany('App\PackagePrice');
    }
    
    public function activity(){
        return $this->hasMany('App\Activity');
    }
    
    public function accomodationDetail(){
        return $this->hasMany('App\AccomodationDetail');
    }
    
    public function packageInclusion(){
        return $this->hasMany('App\PackageInclusion');
    }
    
    public function packageImage(){
        return $this->hasMany('App\PackageImage');
    }
    
    public function packageExclusion(){
        return $this->hasMany('App\PackageExclusion');
    }
    
    public function packageCondition(){
        return $this->hasMany('App\PackageCondition');
    }
    
    public function packagePolicy(){
        return $this->hasMany('App\PackagePolicy');
    }
    
    public function packageActivity(){
        return $this->hasMany('App\PackageActivity');
    }
    
    public function packageDestination(){
        return $this->hasMany('App\PackageDestination');
    }
    
    public function packageItinerary(){
        return $this->hasMany('App\PackageItinerary');
    }
	    
}
