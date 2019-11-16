<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = [
    'name', 'description', 'status'
  ];
  
  public function document(){
  	return $this->hasMany('App\Document');
  }
  
  public function agentDocument(){
  	return $this->hasMany('App\AgentDocument');
  }
}
