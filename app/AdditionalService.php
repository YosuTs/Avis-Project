<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalService extends Model
{
  protected $fillable = [
  'service_name', 'price'
];
}
