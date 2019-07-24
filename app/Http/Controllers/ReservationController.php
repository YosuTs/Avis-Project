<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Category;

class ReservationController extends Controller
{
    public function index()
    {
      $locations = Location::all();

      return view('reservation.index')->withLocations($locations);
    }

    public function personal_information(Request $request)
    {
      return view('reservation.personal_information')->withRequest($request);
    }

    public function show_pay(Request $request)
    {
      return view('reservation.pay')->withRequest($request);
    }
}
