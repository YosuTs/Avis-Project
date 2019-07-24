<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalService;

class AdditionalServiceController extends Controller
{
    public function showAdditionalServices(Request $request)
    {
      $additional_services = AdditionalService::all();

      return view('additionalService.index')->withServices($additional_services)->withRequest($request);
    }
}
