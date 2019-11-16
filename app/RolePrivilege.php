<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePrivilege extends Model
{
     protected $fillable = [
    'privilege_id', 'role_id', 'status'
  ];
}
