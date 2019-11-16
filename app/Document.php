<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
    'client_details_id', 'document_type_id', 'doc_name'
  ];
  
  public function documentType(){
  	return $this->belongsTo('App\DocumentType');
  }
  
  public function clientdetail(){
  	return $this->belongsTo('App\ClientDetail');
  }
}
