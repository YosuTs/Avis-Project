@extends('master')
@section('content')
  <form action="{{route('reservation.detail')}}" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6">
        <label for="reservation_id">Reservation id: </label>
        <input class="form-control" type="text" name="id" id="reservation_id">
      </div>
      <div class="col-md-6">
        <label for="lastname">Lastname: </label>
        <input class="form-control" type="text" name="lastname" id="lastname">
      </div>
    </div>
    <div class="row">
      <button class="btn" type="submit">Search</button>
    </div>
  </form>
@endsection()
