<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConektaPayment extends Model
{
  protected $fillable = [
    'total', 'description', 'name', 'card_number', 'email'
  ];
}
