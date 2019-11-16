<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
  protected $fillable = [
    'client_details_id', 'department_id', 'designation_id', 'contact_name', 'contact_number' ,
    'responsibilities'
  ];
  public function designation(){
    return $this->belongsTo('App\Designation');
    }
  public function department(){
    return $this->belongsTo('App\Department');
    }
  public function clientdetail(){
    return $this->belongsTo('App\ClientDetail');
    }

}
