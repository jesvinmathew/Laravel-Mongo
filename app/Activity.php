<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title', 'description', 'package_id'
    ];
    
    public function packageActivity(){
        return $this->hasMany('App\PackageActivity');
    }
}
