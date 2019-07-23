<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $fillable = [
  'name', 'is_airport'
];

public function categories()
{
  return $this->belongsToMany('\App\Category');
}
public function aditional_services()
{
  return $this->belongsToMany('\App\AditionalServices');
}
}
