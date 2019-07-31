@extends('master')
@section('content')
    <div class="row">
      <div class="col-md-12">
        <h1>Avis</h1>
      </div>
    </div>
        <form class="" action="{{route('categories.show')}}" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <label for="pick_up_location">Pick up location: </label>
              <select class="form-control" name="pick_up_location_id" id="pick_up_location">
                @foreach ($locations as $location)
                  <option  value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label for="pick_up_date">Pick up date: </label>
              <input class="form-control" type="date" name="pick_up_date" id="pick_up_date" value="">
              <select class="form-control" name="pick_up_time">
                <option value="00:00">00:00</option>
                <option value="01:00">01:00</option>
                <option value="02:00">02:00</option>
                <option value="03:00">03:00</option>
                <option value="04:00">04:00</option>
                <option value="05:00">05:00</option>
                <option value="06:00">06:00</option>
                <option value="07:00">07:00</option>
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option selected value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
                <option value="23:00">23:00</option>
              </select>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label for="drop_off_location">Drop off location:</label>
            <select class="form-control" name="drop_off_location_id" id="drop_off_location">
              @foreach ($locations as $location)
                <option  value="{{$location->id}}">{{$location->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label for="drop_off_date">Drop off date: </label>
            <input class="form-control" type="date" name="drop_off_date" id="drop_off_date" value="">
            <select class="form-control" name="pick_up_time">
              <option value="00:00">00:00</option>
              <option value="01:00">01:00</option>
              <option value="02:00">02:00</option>
              <option value="03:00">03:00</option>
              <option value="04:00">04:00</option>
              <option value="05:00">05:00</option>
              <option value="06:00">06:00</option>
              <option value="07:00">07:00</option>
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option selected value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
              <option value="23:00">23:00</option>
            </select>
          </div>
        </div>

        <div class="row">
          <button type="submit" class="btn" name="button">Next</button>
        </div>
      </form>
@endsection()
