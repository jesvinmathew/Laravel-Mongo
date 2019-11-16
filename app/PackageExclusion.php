<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageExclusion extends Model
{
    public function package(){
        return $this->belongsTo('App\Package');
    }
}
