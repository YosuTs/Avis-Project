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
          {{-- <div class="col-md-4">
            <h4>{{$category->name}}</h4>
            <ul>
              <li>Capacity: {{$category->capacity}}</li>
              <li>Price: ${{$category->cost}}</li>
            </ul>
            <button style="allign-rigth" class="btn" type="submit" name="category" value="{{$category->id}}">Pick</button>
          </div> --}}
          <div class="col-md-3">
              <div class="card mb-4 shadow mb-5 bg-white rounded">
                <img class="card-img-top" src="https://banner2.kisspng.com/20180215/dvw/kisspng-sports-car-automotive-design-vector-open-top-sports-car-5a85597ae384c2.0021387915186886349319.jpg" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">{{$category->name}}</p>
                  <ul>
                    <li>Capacity: {{$category->capacity}}</li>
                    <li>Price: ${{$category->cost}}</li>
                  </ul>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button class="btn btn-sm btn-outline-secondary" type="submit" name="category" value="{{$category->id}}">Pick</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      @endforeach
    </div>
    <input type="hidden" name="pick_up_date" value="{{$request->pick_up_date}}">
    <input type="hidden" name="pick_up_location_id" value="{{$request->pick_up_location_id}}">
    <input type="hidden" name="drop_off_date" value="{{$request->drop_off_date}}">
    <input type="hidden" name="drop_off_location_id" value="{{$request->drop_off_location_id}}">
  </form>
  {{-- <ol>
    <li>pick_up_date: {{$request->pick_up_date}}</li>
    <li>pick_up_location_id: {{$request->pick_up_location_id}}</li>
    <li>drop_off_date: {{$request->drop_off_date}}</li>
    <li>drop_off_location_id: {{$request->drop_off_location_id}}</li>
  </ol> --}}
@endsection()
