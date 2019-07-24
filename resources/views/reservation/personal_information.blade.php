@extends('master')
@section('content')
  <form action="{{route('pay.show')}}" method="post">
    {{csrf_field()}}
    <label for="name">Name: </label>
    <input type="text" name="name" id="name"/>
    <br>
    <label for="lastname">Lastname: </label>
    <input type="text" name="lastname" id="lastname"/>
    <br>
    <label for="address">Address: </label>
    <input type="text" name="address" id="address"/>
    <br>
    <label for="email">Email: </label>
    <input type="text" name="email" id="email"/>
    <br>
    <label for="cellphone">Cellphone: </label>
    <input type="text" name="cellphone" id="cellphone" />
    <br>

    <input type="hidden" name="pick_up_date" value="{{$request->pick_up_date}}">
    <input type="hidden" name="pick_up_location_id" value="{{$request->pick_up_location_id}}">
    <input type="hidden" name="drop_off_date" value="{{$request->drop_off_date}}">
    <input type="hidden" name="drop_off_location_id" value="{{$request->drop_off_location_id}}">
    <input type="hidden" name="category" value="{{$request->category}}">
    @foreach ($request->extras as $extra)
      <input type="hidden" name="extras[]" value="{{$extra}}">
    @endforeach
    <button class="btn" type="submit" name="button">Send</button>
  </form>
  <ol>
    <li>pick_up_date: {{$request->pick_up_date}}</li>
    <li>pick_up_location_id: {{$request->pick_up_location_id}}</li>
    <li>drop_off_date: {{$request->drop_off_date}}</li>
    <li>drop_off_location_id: {{$request->drop_off_location_id}}</li>
    <li>category: {{$request->category}}</li>
    @foreach ($request->extras as $extra)
      <li>extra: {{$extra}}</li>
    @endforeach
  </ol>
@endsection()
