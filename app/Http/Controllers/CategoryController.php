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

  public function showCategories()
  {
    $categories = Category::all();

    return view('category.categories')->withCategories($categories);
  }

  public function returnAdd()
  {
    $locations = Location::all();
    return view('category.add_category')->withLocations($locations);
  }

  public function add(Request $request)
  {
    $category = Category::create(array(
      'name' => $request->name,
      'capacity' => $request->capacity,
      'cost' => $request->price
    ));

    if($request->locations != null){
      $category->locations()->attach($request->locations);
    }

    $categories = Category::all();
    return view('category.categories')->withCategories($categories);
  }
  public function delete($id)
  {
    $category = Category::find($id);
    $category->delete();

    $categories = Category::all();
    return view('category.categories')->withCategories($categories);
  }
}
