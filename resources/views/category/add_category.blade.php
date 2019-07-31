@extends('master')
@section('content')
  <div class="row display-tr">
    <h3>Add category</h3>
  </div>
  <form action="{{route('category.add')}}" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-4">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label for="capacity">Capacity</label>
        <input class="form-control" type="text" name="capacity" id="capacity">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label for="price">Price</label>
        <input class="form-control" type="text" name="price" id="price">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4>Locations</h4>
      </div>
    </div>
    <div class="row">
      @foreach ($locations as $location)
        <div class="col-md-3">
          <label for="{{$location->id}}">{{$location->name}}</label>
          <input id="{{$location->id}}" type="checkbox" name="locations[]" value="{{$location->id}}">
        </div>
      @endforeach
    </div>
    <div class="row">
      <button class="btn" type="submit">Add</button>
    </div>
  </form>
@endsection()
