@extends('master')
@section('content')
  <div class="row display-tr">
    <h3>Personal information</h3>
  </div>
  <form action="{{route('pay.show')}}" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" id="name"/>
      </div>
      <div class="col-md-6">
        <label for="lastname">Lastname: </label>
        <input class="form-control" type="text" name="lastname" id="lastname"/>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label for="address">Address: </label>
        <input class="form-control" type="text" name="address" id="address"/>
      </div>
      <div class="col-md-6">
        <label for="cellphone">Cellphone: </label>
        <input class="form-control" type="text" name="cellphone" id="cellphone" />
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <label for="email">Email: </label>
        <input class="form-control" type="text" name="email" id="email"/>
      </div>
      <div class="col-md-6">
        <br>
        <button class="btn" type="submit" name="button" value="pay">See payment options</button>
        <button class="btn" type="submit" name="button" value="reserve">Reserve</button>
      </div>
    </div>

    <input type="hidden" name="pick_up_date" value="{{$request->pick_up_date}}">
    <input type="hidden" name="pick_up_location_id" value="{{$request->pick_up_location_id}}">
    <input type="hidden" name="drop_off_date" value="{{$request->drop_off_date}}">
    <input type="hidden" name="drop_off_location_id" value="{{$request->drop_off_location_id}}">
    <input type="hidden" name="category" value="{{$request->category}}">
    @if ($request->extras != null)
      @foreach ($request->extras as $extra)
        <input type="hidden" name="extras[]" value="{{$extra}}">
      @endforeach
    @endif
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
  </ol>
@endsection()
