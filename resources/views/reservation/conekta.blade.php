@extends('master')
@section('content')
  <div class="row display-tr">
    <h3>Card payment</h3>
  </div>
  <form id="card-form" method="post" action="{{route('pay.pay')}}">
    {{csrf_field()}}
    <input type="text" name="conektaTokenId" id="conektaTokenId" value="">
    <div class="row">
      <div class="col-md-6">
        <label for="name">Name</label>
        <input class="form-control" data-conekta="card[name]" type="text" name="name_conekta" value="{{$request->name}} {{$request->lastname}}" id="name">
      </div>
      <div class="col-md-6">
        <label for="card-number">Card Number</label>
        <input class="form-control" type="text" data-conekta="card[number]" name="card" id="card" value="4242424242424242" maxlength="16" id="card-number">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label for="cvc">CVC</label>
        <input class="form-control" data-conekta="card[cvc]" type="text" value="123" maxlength="4" id="cvc">
      </div>
      <div class="col-md-6">
        <label>Expiration date: (MM/YY)</label>
        <br>
        <input style="width:50px; display:inline-block;" class="form-control" type="text" data-conekta="card[exp_month]" value="09" maxlength="2">
        <input style="width:50px; display:inline-block;" class="form-control" type="text" data-conekta="card[exp_year]" value="22" maxlength="2">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label for="email">Email</label>
        <input class="form-control" name="email" type="text" value="{{$request->email}}" id="email">
      </div>
      <div class="col-md-6">
        <br>
        <br>
        <h5>Total: ${{$request->total}}</h5>
        <input type="hidden" name="total" value="{{$request->total}}">
        <input type="hidden" name="description" value="{{$request->name}} {{$request->lastname}} - ${{$request->total}}">
        <input type="hidden" name="name" value="{{$request->name}}">
        <input type="hidden" name="lastname" value="{{$request->lastname}}">
        <input type="hidden" name="pick_up_date" value="{{$request->pick_up_date}}">
        <input type="hidden" name="pick_up_location_id" value="{{$request->pick_up_location_id}}">
        <input type="hidden" name="drop_off_date" value="{{$request->drop_off_date}}">
        <input type="hidden" name="drop_off_location_id" value="{{$request->drop_off_location_id}}">
        <input type="hidden" name="category" value="{{$request->category}}">
        <input type="hidden" name="address" value="{{$request->address}}">
        <input type="hidden" name="cellphone" value="{{$request->cellphone}}">
        @if ($request->extras != null)
          @foreach ($request->extras as $extra)
            <input type="hidden" name="extras[]" value="{{$extra}}">
          @endforeach
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="button" class="btn btn-success" id="pay" name="button">Pay</button>
      </div>
    </div>
  </form>

  <ol>
    <li>pick_up_date: {{$request->pick_up_date}}</li>
    <li>pick_up_location_id: {{$request->pick_up_location_id}}</li>
    <li>drop_off_date: {{$request->drop_off_date}}</li>
    <li>drop_off_location_id: {{$request->drop_off_location_id}}</li>
    <li>category: {{$request->category}}</li>
    @if ($request->extras != null)
      @foreach ($request->extras as $extra)
        <li>extra: {{$extra}}</li>
      @endforeach
    @endif
    <li>name: {{$request->name}}</li>
    <li>lastname: {{$request->lastname}}</li>
    <li>address: {{$request->address}}</li>
    <li>email: {{$request->email}}</li>
    <li>cellphone: {{$request->cellphone}}</li>
    <li>total: {{$request->total}}</li>
  </ol>

  <script type="text/javascript">
    Conekta.setPublicKey("key_DdmfjuvyciLNGhsCz9UQkew");

    var conektaSuccessResponseHandler = function(token){
      $('#conektaTokenId').val(token.id)
      $('#card-form').submit();
    };

    var conektaErrorResponseHandler = function(response){
      var $form = $('#card-form');

      alert(response.message_to_purchaser);
    }

    // $(document).ready(function(){
    //   $('#card-form').submit(function(e){
    //     e.preventDefault();
    //
    //     var $form = $('#card-form');
    //
    //     Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
    //
    //     e.currentTarget.submit();
    //   })
    // })

    $('#pay').on('click', function(e){
      var $form = $('#card-form');

      Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
    });
  </script>
@endsection()
