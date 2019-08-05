<?php
namespace App\Http\Controllers;

//require_once("app/PaymentConekta.php");
//extract($_REQUEST)
use App\PaymentConekta;
use App\ConektaPayment;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Location;


class PayController extends Controller
{
    public function pay(Request $request)
    {
      $validator = Validator::make($request->all(), [
        "pick_up_location_id" => 'required',
        "drop_off_location_id" => 'required',
        "pick_up_date" => 'required|date|after:today',
        "drop_off_date" => 'required|date|after:pick_up_date',
        'category' => 'required',
        'name' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'email' => 'required|email',
        'cellphone' => 'required|numeric',
        'name_conekta' => 'required',
        'card' => 'required|numeric',
        'cvc' => 'required|numeric',
        'exp_month' => 'required|numeric',
        'exp_year' => 'required|numeric'
      ]);

      if($validator->fails())
      {
          //return redirect()->back()->withErrors($validator)->withInput();
          return view('reservation.conekta')->withErrors($validator)->withRequest($request);
      }

      $new_total = $request->total*0.90;
      //echo "Total: ".$new_total;
      $oPayment = new PaymentConekta($request->conektaTokenId, $request->card, $request->name_conekta, $request->description, intval($new_total), $request->email);

      if($oPayment->pay()){
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
          'total_cost'=> $new_total,
          'paid' => true,
          'paid_at' => date('Y-m-d H:i:s'),
          'discount' => '10%',
          'canceled' => false,
          'canceled_at'=> null,
          'refound_percentage' => null,
          'order_id' => $oPayment->order->id
        ));
        if($request->extras != null){
          $reservation->additionalServices()->attach($request->extras);
        }
        $last_card_digits = substr($request->card, -4);

        $conekta_payment = ConektaPayment::create(array(
          'total' => $new_total,
          'description' => $request->description,
          'name' => $reservation->name,
          'card_number' => $last_card_digits,
          'email' => $reservation->email
        ));

        $this->send_confirmation_email($reservation->id, $reservation->name, $reservation->email);
        return $this->show_reservation_details($reservation->id, $reservation->lastname);
      }
      else{
        echo $oPayment->error;
      }
    }

    public function show_reservation_details($id, $lastname)
    {
      $reservation = Reservation::find($id);
      $pick_up_location = Location::find($reservation->pick_up_location_id);
      $drop_off_location = Location::find($reservation->drop_off_location_id);

      return view('reservation.details')->withReservation($reservation)->withPulocation($pick_up_location)->withDolocation($drop_off_location);
    }

    public function send_confirmation_email($id, $name, $email)
    {
      $msg = "Hello ".$name."\nYour reservation id is: ".$id."\n";
      $msg = wordwrap($msg, 70);
      mail($email, "Avis reservation id", $msg);
    }
}
