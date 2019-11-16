<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    protected $fillable = [
        'start_date', 'end_date', 'budget', 'standard', 'delux', 'package_id'
    ];
    
    public function package(){
        return $this->belongsTo('App\Package');
    }
}
