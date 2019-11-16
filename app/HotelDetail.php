<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelDetail extends Model
{
	 protected $fillable = [
    'user_id', 'hotel_master_id', 'hotel_type_id', 'name', 'location', 'description',
    'address_1', 'address_2', 'pincode', 'contactnumber_1', 'contactnumber_2', 'contact_person',
    'country_id', 'state_id', 'city_id', 'licensenumber', 'lattitude', 'longitude',
    'cancellation_policy_id', 'policy', 'bank_name', 'branch', 'bank_branch', 'account_holder_name',
    'account_number', 'ifsc_code', 'gst_number', 'swift_code', 'designation', 'website', 'email',
    'channel_manager-name', 'channel_manager-status', 'status'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
     public function hotelmaster(){
    	return $this->belongsTo('App\HotelMaster');
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
}
