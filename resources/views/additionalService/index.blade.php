@extends('master')
@section('content')
  <div class="row display-tr">
    <h3>Additional services</h3>
  </div>
  <form action="{{route('personal_information.show')}}" method="post">
    {{csrf_field()}}
      @foreach ($services as $service)
        <div class="list-group">
          {{-- <div class="list-group-item col-md-4">
            <input class="" type="checkbox" name="extras[]" value="{{$service->id}}" id="{{$service->id}}">
            <label class="" for="{{$service->id}}">{{$service->service_name}} - ${{$service->price}}</label>
          </div> --}}
          <li class="list-group-item d-flex justify-content-between align-items-center col-md-6">
            <label class="" for="{{$service->id}}">{{$service->service_name}} - ${{$service->price}}</label>
            <input class="" type="checkbox" name="extras[]" value="{{$service->id}}" id="{{$service->id}}">
          </li>
        </div>
      @endforeach

    <input type="hidden" name="pick_up_date" value="{{$request->pick_up_date}}">
    <input type="hidden" name="pick_up_location_id" value="{{$request->pick_up_location_id}}">
    <input type="hidden" name="drop_off_date" value="{{$request->drop_off_date}}">
    <input type="hidden" name="drop_off_location_id" value="{{$request->drop_off_location_id}}">
    <input type="hidden" name="category" value="{{$request->category}}">
    <button class="btn btn-success" type="submit" name="button">Continue</button>
  </form>
  {{-- <ol>
    <li>pick_up_date: {{$request->pick_up_date}}</li>
    <li>pick_up_location_id: {{$request->pick_up_location_id}}</li>
    <li>drop_off_date: {{$request->drop_off_date}}</li>
    <li>drop_off_location_id: {{$request->drop_off_location_id}}</li>
    <li>category: {{$request->category}}</li>
  </ol> --}}
@endsection()
