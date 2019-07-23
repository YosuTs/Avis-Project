<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  protected $fillable = [
    'brand', 'model', 'year', 'category_id'
  ];

  public function category()
  {
    #more git tests
    return $this->belongsTo('App/Category');
  }
}
