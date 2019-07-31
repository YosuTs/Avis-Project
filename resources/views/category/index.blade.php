@extends('master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Categories</h3>
  </div>
</div>
  <form action="{{route('additionalServices.show')}}" method="post">
    {{csrf_field()}}
    <div class="row">
      @foreach ($categories as $category)
          <div class="col-md-4">
            <h4>{{$category->name}}</h4>
            <ul>
              <li>Capacity: {{$category->capacity}}</li>
              <li>Price: ${{$category->cost}}</li>
            </ul>
            <button style="allign-rigth" class="btn" type="submit" name="category" value="{{$category->id}}">Pick</button>
          </div>
      @endforeach
    </div>
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
