<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentPolicy extends Model
{
    public function packagePolicy(){
        return $this->hasMany('App\PackagePolicy');
    }
}
