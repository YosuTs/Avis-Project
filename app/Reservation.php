<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $fillable = [
  'pick_up_location_id',
  'drop_off_location_id',
  'category_id',
  'name',
  'lastname',
  'address',
  'email',
  'cell_phone',
  'pick_up_date',
  'drop_off_date',
  'total_cost',
  'paid',
  'paid_at',
  'discount',
  'canceled',
  'canceled_at',
  'refound_percentage'
];
}
