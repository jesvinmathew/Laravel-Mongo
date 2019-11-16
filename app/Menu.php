<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
       'id', 'icon', 'text', 'link', 'menu_head_id', 'privilege_id'
    ];
    
    public function subMenu(){
        return $this->hasMany('App\SubMenu');
    }
}
