@extends('master')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <h3>Cancelation</h3>
    </div>
  </div>
    <div class="row">
      @if ($canceled)
        <div class="col-md-12">
          <p>Your reservation has been canceled</p>
        </div>
      @else
        <div class="col-md-12">
          <p>{{$error}}</p>
        </div>
      @endif
      <div class="col-md-12">
        <form class="" action="{{route('reservation.index')}}" method="get">
          <button class="btn" type="submit">Return home</button>
        </form>
      </div>
    </div>
@endsection()
