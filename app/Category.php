<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function cars()
  {
    return $this->hasMany('\App\Car');
  }

  public function locations()
  {
    return $this->belongsToMany('\App\Location', 'category_location', 'category_id', 'location_id');
  }

  protected $fillable = [
    'name', 'capacity', 'cost'
  ];
}
