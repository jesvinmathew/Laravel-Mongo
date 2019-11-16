<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentDocument extends Model
{
    public function documentType(){
      return $this->belongsTo('App\DocumentType');
    }
}
