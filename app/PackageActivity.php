<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageActivity extends Model
{
    protected $fillable = [
        'package_id', 'activity_id'
    ];
    
    public function package(){
        return $this->belongsTo('App\Package');
    }
    
    public function activity(){
        return $this->belongsTo('App\Activity');
    }
}
