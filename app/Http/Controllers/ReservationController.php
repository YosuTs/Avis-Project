<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class ReservationController extends Controller
{
    public function index()
    {
      $locations = Location::all();

      return view('reservation.index')->withLocations($locations);
    }

    public function showAvailableLocations(Request $request)
    {
      
    }
}
