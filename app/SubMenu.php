<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    public function menu(){
        return $this->hasMany('App\Menu');
    }
}
