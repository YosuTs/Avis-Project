@extends('master')
@section('content')
    <div class="row">
      @if ($reservation!=null)
        <div class="col-md-12">
          <ul>
            <li>Reservation id: {{$reservation->id}}</li>
            <li>Name: {{$reservation->name}}</li>
            <li>Lastname: {{$reservation->lastname}}</li>
            <li>Pick up date: {{$reservation->pick_up_date}}</li>
            <li>Pick up location: {{$pulocation->name}}</li>
            <li>Drop off date: {{$reservation->drop_off_date}}</li>
            <li>Drop off location: {{$dolocation->name}}</li>
          </ul>
        </div>
        <div class="col-md-12">
          <form class="" action="{{route('reservation.index')}}" method="get">
            <button class="btn" type="submit">Return home</button>
          </form>
        </div>
      @else
        <div class="col-md-12">
          <h1>Couldn't find reservation</h1>
          <div class="col-md-12">
            <form class="" action="{{route('reservation.index')}}" method="get">
              <button class="btn" type="submit">Return home</button>
            </form>
          </div>
        </div>
      @endif

    </div>
@endsection()
