@extends('master')
@section('content')
  <div class="row display-tr">
    <h3>Categories</h3>
  </div>
  <div class="row">
      <table class="table table-stripped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <th scope="row">{{$category->id}}</th>
              <td>{{$category->name}}</td>
              <td>{{$category->capacity}}</td>
              <td>${{$category->cost}}</td>
              <td><a class="btn" href="{{route('category.delete', $category->id)}}">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  <div class="row">
    <a class="btn" href="{{route('category.returnAdd')}}">Add category</a>
  </div>
@endsection()
