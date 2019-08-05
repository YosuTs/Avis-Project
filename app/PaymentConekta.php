<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
require_once(app_path()."/conekta-php-master/lib/Conekta.php");

class PaymentConekta extends Model
{

    private $ApiKey = "key_tr18zKJ4BSsT9Z8EVssoLg";
    private $ApiVersion = "2.0.0";
    public  $token;
    public  $card;
    public  $name;
    public  $description;
    public  $total;
    public  $email;
    public  $error;
    public $order;

    public function __construct($token, $card, $name, $description, $total, $email)
    {
      $this->token = $token;
      $this->card = $card;
      $this->name = $name;
      $this->description = $description;
      $this->total = $total;
      $this->email = $email;
      //echo($this->card);
    }

    public function pay()
    {
      \Conekta\Conekta::setApiKey($this->ApiKey);
      \Conekta\Conekta::setApiVersion($this->ApiVersion);

      if(!$this->validate()){
        return false;
      }
      if(!$this->create_customer()){
        return false;
      }
      if(!$this->create_order()){
        return false;
      }

      return true;
    }

    public function validate()
    {
      if($this->card == "" || $this->name == "" || $this->description == "" || $this->total == "" || $this->email == ""){
        $this->error = "All fields are required";
        return false;
      }
      if(strlen($this->card)<14){
        $this->error = "Invalid card number".$this->card;
        return false;
      }
      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        $this->error = "Invalid email".$this->email;
        return false;
      }

      return true;
    }

    public function create_customer()
    {
      try{
        $this->customer = \Conekta\Customer::create(
          array(
            "name" => $this->name,
            "email" => $this->email,
            "payment_sources" => array(
              array(
                "type" => "card",
                "token_id" => $this->token
              )
            ) //Payment sources
          ) //Customer
        );
      }
      catch(\Conekta\ProcessingError $error){
        $this->error = $error->getMessage();
        return false;
      }
      catch(\Conekta\ParameterValidationError $error){
        $this->error = $error->getMessage();
        return false;
      }
      catch(\Conekta\Handler $error){
        $this->error = $error->getMessage();
        return false;
      }
      return true;
    }

    public function create_order()
    {
      try{
        $this->order = \Conekta\Order::create(
          array(
            "amount" => $this->total,
            "line_items" => array(
              array(
                "name" => $this->description,
                "unit_price" => $this->total*100,
                "quantity" => 1
              )// First line item
            ), //Line items
            "currency" => "MXN",
            "customer_info" => array(
              "customer_id" => $this->customer->id
            ), //Customer info
            "charges" => array(
              array(
                "payment_method" => array(
                  "type" => "default"
                )
              )// First charge
            )// Charges
          ) // Order
        );
      }
      catch(\Conekta\ProcessingError $error){
        $this->error = $error->getMessage();
        return false;
      }
      catch(\Conekta\ParameterValidationError $error){
        $this->error = $error->getMessage();
        return false;
      }
      catch(\Conekta\Handler $error){
        $this->error = $error->getMessage();
        return false;
      }
      return true;
    }

    public function refund($id, $refund)
    {
      \Conekta\Conekta::setApiKey($this->ApiKey);
      \Conekta\Conekta::setApiVersion($this->ApiVersion);
      $amount = intval($refund)*100;
      try {
        $this->order = \Conekta\Order::find($id);
        $this->order->refund(array(
          'reason' => 'requested_by_client',
          'amount' => $amount
        ));
      }
      catch(\Conekta\ProcessingError $error){
        $this->error = $error->getMessage();
        return false;
      }
      catch(\Conekta\ParameterValidationError $error){
        $this->error = $error->getMessage();
        return false;
      }
      catch(\Conekta\Handler $error){
        $this->error = $error->getMessage();
        return false;
      }
      return true;
    }


}
