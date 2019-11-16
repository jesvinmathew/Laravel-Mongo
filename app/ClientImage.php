<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientImage extends Model
{
    protected $fillable = [
    'client_details_id', 'image_name', 'image_caption'
  ];
}
