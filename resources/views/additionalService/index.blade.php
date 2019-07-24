@extends('master')
@section('content')
  <form action="{{route('personal_information.show')}}" method="post">
    {{csrf_field()}}
    <ol>
    @foreach ($services as $service)
      <li>
        <label for="{{$service->id}}">{{$service->service_name}}</label>
        <input type="checkbox" name="extras[]" value="{{$service->id}}" id="{{$service->id}}">
      </li>
    @endforeach
    </ol>
    <input type="hidden" name="pick_up_date" value="{{$request->pick_up_date}}">
    <input type="hidden" name="pick_up_location_id" value="{{$request->pick_up_location_id}}">
    <input type="hidden" name="drop_off_date" value="{{$request->drop_off_date}}">
    <input type="hidden" name="drop_off_location_id" value="{{$request->drop_off_location_id}}">
    <input type="hidden" name="category" value="{{$request->category}}">
    <button class="btn" type="submit" name="button">Send</button>
  </form>
  <ol>
    <li>pick_up_date: {{$request->pick_up_date}}</li>
    <li>pick_up_location_id: {{$request->pick_up_location_id}}</li>
    <li>drop_off_date: {{$request->drop_off_date}}</li>
    <li>drop_off_location_id: {{$request->drop_off_location_id}}</li>
    <li>category: {{$request->category}}</li>
  </ol>
@endsection()
