<?php

namespace App\Http\Controllers;

require_once(app_path()."/conekta-php-master/lib/Conekta.php");

use Illuminate\Http\Request;
use App\Location;
use App\Category;
use App\AdditionalService;
use App\Reservation;
use Carbon\Carbon;
use App\PaymentConekta;

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
      $days = $interval->format("%a")+1;

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
          'refound_percentage' => null,
          'order_id' =>null
        ));
        if($request->extras != null){
          $reservation->additionalServices()->attach($request->extras);
        }
        $this->send_confirmation_email($reservation->id, $reservation->name, $reservation->email);
        return $this->show_reservation_details($reservation->id, $reservation->lastname);
        //return view('reservation.details')->withReservation($reservation);
      }
      else{
        return view('reservation.pay')->withRequest($request)->withTotal($total_price);
      }

    }

    public function show_reservation_details($id, $lastname)
    {
      //$reservation = Reservation::find($id);
      $reservation = Reservation::where('id', $id)->where('lastname', $lastname)->where('canceled', 0)->first();

      $pick_up_location = Location::find($reservation->pick_up_location_id);
      $drop_off_location = Location::find($reservation->drop_off_location_id);

      return view('reservation.details')->withReservation($reservation)->withPulocation($pick_up_location)->withDolocation($drop_off_location);
    }

    public function show_reservation_details_post(Request $request)
    {
      $id = $request->id;
      $reservation = Reservation::where('id', $id)->where('lastname', $request->lastname)->where('canceled', 0)->first();
      //$reservation = Reservation::find($id);

      if($reservation != null){
        $pick_up_location = Location::find($reservation->pick_up_location_id);
        $drop_off_location = Location::find($reservation->drop_off_location_id);
      }
      else{
        $pick_up_location = null;
        $drop_off_location = null;
      }
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

    public function send_confirmation_email($id, $name, $email)
    {
      $msg = "Hello ".$name."\nYour reservation id is: ".$id."\n";
      $msg = wordwrap($msg, 70);
      mail($email, "Avis reservation id", $msg);
    }

    public function cancel_reservation($id)
    {
      $reservation = Reservation::find($id);
      $fix_amount = 300;

      $created_at = $reservation->created_at;
      $pick_up_date = Carbon::createFromFormat('Y-m-d H:s:i', $reservation->pick_up_date);
      $now = Carbon::now();

      $interval = $created_at->diffInHours($now);
      $pick_up_interval = $now->diffInHours($pick_up_date);

      if($interval < 24){
        $refund = $reservation->total_cost-$fix_amount;
        $refund_percentage = "100%";
      }
      else{
        if($pick_up_interval > 48){
          $refund = ($reservation->total_cost*0.50)-$fix_amount;
          $refund_percentage = "50%";
        }
        if($pick_up_interval < 48){
          $refund = ($reservation->total_cost*0.25)-$fix_amount;
          $refund_percentage = "25%";
        }
      }

      $order = new PaymentConekta(null, null, null, null, null, null);

      if($order->refund($reservation->order_id, $refund)){
        $reservation->update(array(
          'canceled' => true,
          'canceled_at' => $now,
          'refound_percentage' => $refund_percentage
        ));
        return view('reservation.cancelation_result')->withCanceled(true);
      }
      else{
        //echo($order->error);
        return view('reservation.cancelation_result')->withCanceled(false);
      }

    }

}
