<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
     protected $fillable = [
    'user_id', 'client_master_id', 'hotel_type_id', 'hotel_stars_id', 'name', 'location', 
    'description','address_line_1', 'address_line_2', 'pincode', 'contact_number_1', 'contact_number_2',
    'contact_person', 'country_id', 'state_id', 'district_id', 'city_id', 'license_number', 'lattitude', 'longitude',
    'cancellation_policy_id', 'policy', 'bank_name', 'branch', 'bank_branch', 'account_holder_name',
    'account_number', 'pan_number', 'ifsc_code', 'gst_number', 'swift_code', 'designation', 'website',
    'email', 'channel_manager_name', 'channel_manager_status', 'status'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
     public function clientMaster(){
    	return $this->belongsTo('App\ClientMaster');
    }
    public function hoteltype(){
    	return $this->belongsTo('App\HotelType');
    }
     public function city(){
    	return $this->belongsTo('App\City');
    }
     public function state(){
    	return $this->belongsTo('App\State');
    }
     public function country(){
    	return $this->belongsTo('App\Country');
    }
     public function cancellationpolicy(){
    	return $this->belongsTo('App\CancellationPolicy');
    }
    public function hotellandscape(){
        return $this->belongsTo('App\HotelLandscape');
    }
    public function hotelroom(){
        return $this->hasMany('App\HotelRoom');
    }
     public function hotelstar(){
        return $this->belongsTo('App\HotelStar');
    }
    public function clientcontact(){
        return $this->hasMany('App\ClientContact');
    }
    public function district(){
        return $this->belongsTo('App\District');
    }
     public function designation(){
        return $this->belongsTo('App\Designation');
    }
    public function document(){
        return $this->hasMany('App\Document');
    }

}
