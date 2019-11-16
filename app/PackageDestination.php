<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageDestination extends Model
{
    protected $fillable = [
        'package_id', 'name','description'
    ];
    
    public function package(){
        return $this->belongsTo('App\Package');
    }
}
