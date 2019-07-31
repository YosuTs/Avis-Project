@extends('master')
@section('content')
  <div class="row">
    <form class="" action="{{route('reservation.choose_payment')}}" method="post">
      {{csrf_field()}}
      <button class="btn" type="submit" name="button" value="conekta">Pay with Conekta</button>

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
      <input type="hidden" name="total" value="{{$total}}">
      <input type="hidden" name="name" value="{{$request->name}}">
      <input type="hidden" name="lastname" value="{{$request->lastname}}">
      <input type="hidden" name="email" value="{{$request->email}}">
      <input type="hidden" name="address" value="{{$request->address}}">
      <input type="hidden" name="cellphone" value="{{$request->cellphone}}">
    </form>
  </div>
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
    <li>total: {{$total}}</li>
  </ol>
@endsection()
