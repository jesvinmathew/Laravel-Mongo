<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagePolicy extends Model
{
    public function package(){
        return $this->belongsTo('App\Package');
    }
    
    public function agentPolicy(){
        return $this->belongsTo('App\AgentPolicy');
    }
}
