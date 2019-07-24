<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Location;

class CategoryController extends Controller
{
  public function showAvailableCategories(Request $request)
  {
    $pickupLocation = Location::find($request->pick_up_location_id);

    $categories = $pickupLocation->categories;

    return view('category.index')->withCategories($categories)->withRequest($request);
  }
}
