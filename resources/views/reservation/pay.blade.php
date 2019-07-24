@extends('master')
@section('content')
  <ol>
    <li>pick_up_date: {{$request->pick_up_date}}</li>
    <li>pick_up_location_id: {{$request->pick_up_location_id}}</li>
    <li>drop_off_date: {{$request->drop_off_date}}</li>
    <li>drop_off_location_id: {{$request->drop_off_location_id}}</li>
    <li>category: {{$request->category}}</li>
    @foreach ($request->extras as $extra)
      <li>extra: {{$extra}}</li>
    @endforeach
    <li>name: {{$request->name}}</li>
    <li>lastname: {{$request->lastname}}</li>
    <li>address: {{$request->address}}</li>
    <li>email: {{$request->email}}</li>
    <li>cellphone: {{$request->cellphone}}</li>
  </ol>
@endsection()
