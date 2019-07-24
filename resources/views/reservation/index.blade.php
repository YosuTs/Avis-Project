@extends('master')
@section('content')
    <div class="row">
      <div class="col-md-12">
        <h1>Main View</h1>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form class="" action="{{route('categories.show')}}" method="post">
              {{csrf_field()}}
              <div class="">
                <label for="pick_up_location">Pick up location: </label>
                <select class="" name="pick_up_location_id" id="pick_up_location">
                  @foreach ($locations as $location)
                    <option  value="{{$location->id}}">{{$location->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="">
                <label for="pick_up_date">Pick up date: </label>
                <input type="date" name="pick_up_date" id="pick_up_date" value="">
              </div>

              <div class="">
                <label for="drop_off_location">Drop off location:</label>
                <select class="" name="drop_off_location_id" id="drop_off_location">
                  @foreach ($locations as $location)
                    <option  value="{{$location->id}}">{{$location->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="">
                <label for="drop_off_date">Drop off date: </label>
                <input type="date" name="drop_off_date" id="drop_off_date" value="">
              </div>
              <button type="submit" class="btn" name="button">Next</button>
        </form>
      </div>
      <div class="col-md-2"></div>
    </div>
@endsection()
