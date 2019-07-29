@extends('master')
@section('content')
  <div class="row display-tr">
    <h3>Card payment</h3>
  </div>
  <form id="card-form">
    {{csrf_field()}}
    <input type="text" name="conektaTokenId" id="conektaTokenId" value="">
    <div class="row">
      <div class="col-md-6">
        <label for="name">Name</label>
        <input class="form-control" data-conekta="card[name]" type="text" name="name" value="Yosu Tanamachi Sánchez" id="name">
      </div>
      <div class="col-md-6">
        <label for="card-number">Card Number</label>
        <input class="form-control" type="text" data-conekta="card[number]" value="4242424242424242" maxlength="16" id="card-number">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label for="name">CVC</label>
        <input class="form-control" data-conekta="card[cvc]" type="text" value="123" maxlength="4" id="cvc">
      </div>
      <div class="col-md-6">
        <label for="card-number">Expiration date: (MM/YY)</label>
        <br>
        <input style="width:50px; display:inline-block;" class="form-control" type="text" data-conekta="card[exp_month]" value="09" maxlength="2">
        <input style="width:50px; display:inline-block;" class="form-control" type="text" data-conekta="card[exp_year]" value="22" maxlength="2">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-success" name="button">Pay</button>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    Conekta.setPublicKey("key_DdmfjuvyciLNGhsCz9UQkew");

    var conektaSuccessResponseHandler = function(token){
      $('#conektaTokenId').val(token.id)
    };

    var conektaErrorResponseHandler = function(response){
      var $form = $('#card-form');

      alert(response.message_to_purchaser);
    }

    $(document).ready(function(){
      $('#card-form').submit(function(e){
        e.preventDefault();

        var $form = $('#card-form');

        Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
      })
    })
  </script>
@endsection()
