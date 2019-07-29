<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Category;
use App\AdditionalService;
use App\Reservation;

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
      $pick_up_date = date_create($request->pick_up_date);
      $drop_off_date = date_create($request->drop_off_date);
      $interval = date_diff($pick_up_date, $drop_off_date);
      $days = $interval->format("%a");

      $category = Category::find($request->category);

      if($request->extras != null){
        foreach ($request->extras as $extra) {
          $extras[] = AdditionalService::find($extra);
        }
        $total_price = $category->cost*$days;
        foreach ($extras as $extra) {
          $total_price += $extra->price;
        }
      }
      else{
        $total_price = $category->cost*$days;
      }
      //echo($total_price);
      if($request->button == "reserve"){
        $reservation = Reservation::create(array(
          'pick_up_location_id' => $request->pick_up_location_id,
          'drop_off_location_id'=> $request->drop_off_location_id,
          'category_id'=> $request->category,
          'name' => $request->name,
          'lastname'=> $request->lastname,
          'address'=>$request->address,
          'email'=>$request->email,
          'cell_phone' => $request->cellphone,
          'pick_up_date' => $request->pick_up_date,
          'drop_off_date'=> $request->drop_off_date,
          'total_cost'=> $total_price,
          'paid' => false,
          'paid_at' => null,
          'discount' => 0,
          'canceled' => false,
          'canceled_at'=> null,
          'refound_percentage' => null
        ));
        if($request->extras != null){
          $reservation->additionalServices()->attach($request->extras);
        }
        return $this->show_reservation_details($reservation->id, $reservation->lastname);
        //return view('reservation.details')->withReservation($reservation);
      }
      else{
        return view('reservation.pay')->withRequest($request);
      }

    }

    public function show_reservation_details($id, $lastname)
    {
      $reservation = Reservation::find($id);
      $pick_up_location = Location::find($reservation->pick_up_location_id);
      $drop_off_location = Location::find($reservation->drop_off_location_id);

      return view('reservation.details')->withReservation($reservation)->withPulocation($pick_up_location)->withDolocation($drop_off_location);
    }

    public function show_reservation_details_post(Request $request)
    {
      $id = $request->id;
      $reservation = Reservation::find($id);
      if($reservation != null){
        $pick_up_location = Location::find($reservation->pick_up_location_id);
        $drop_off_location = Location::find($reservation->drop_off_location_id);
      }
      $pick_up_location = null;
      $drop_off_location = null;
      return view('reservation.details')->withReservation($reservation)->withPulocation($pick_up_location)->withDolocation($drop_off_location);
    }

    public function search_reservation()
    {
        return view('reservation.search');
    }

    public function choose_payment(Request $request)
    {
      if($request->button=="conekta"){
        return view('reservation.conekta')->withRequest($request);
      }
    }

}
