@extends('master')
@section('content')

  <form action="{{route('additionalServices.show')}}" method="post">
    {{csrf_field()}}
    @foreach ($categories as $category)
      <label>Category: {{$category->name}}</label> <br>
      <label>Capacity: {{$category->capacity}}</label> <br>
      <label>Price: ${{$category->cost}}</label> <br>
      <button class="btn" type="submit" name="category" value="{{$category->id}}">Pick</button>
      <br>
    @endforeach
    <input type="hidden" name="pick_up_date" value="{{$request->pick_up_date}}">
    <input type="hidden" name="pick_up_location_id" value="{{$request->pick_up_location_id}}">
    <input type="hidden" name="drop_off_date" value="{{$request->drop_off_date}}">
    <input type="hidden" name="drop_off_location_id" value="{{$request->drop_off_location_id}}">
  </form>
  <ol>
    <li>pick_up_date: {{$request->pick_up_date}}</li>
    <li>pick_up_location_id: {{$request->pick_up_location_id}}</li>
    <li>drop_off_date: {{$request->drop_off_date}}</li>
    <li>drop_off_location_id: {{$request->drop_off_location_id}}</li>
  </ol>
@endsection()
