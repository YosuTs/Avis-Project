<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    {{-- <link rel="stylesheet" href="{{public_path('css/style.css')}}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/site.css') }}" />
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style media="screen">
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-weight: 100;
          height: 100vh;
          margin: 0;
          overflow-y: auto;
      }

      .form{
        border: 1px solid;
        margin-top: 25%;
      }
      button{
        line-height: 15px;
      }

      /* Add a black background color to the top navigation */
      .topnav {
        background-color: #333;
        overflow: hidden;
      }

      /* Style the links inside the navigation bar */
      .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }

      /* Change the color of links on hover */
      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }

      /* Add a color to the active/current link */
      .topnav a.active {
        background-color: #4CAF50;
        color: white;
      }
            /* Set black background color, white text and some padding */
      footer {
        background-color: #555;
        color: white;
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;

      }
      .content{
        margin-top: 5%;
      }
      button{
        margin-top: 5px;
        margin-bottom: 5px;
      }
    </style>
    <header>
      <div class="topnav">
        <a href="{{route('reservation.index')}}">Home</a>
        <a href="{{route('reservation.search')}}">Search reservation</a>
        <a href="{{route('category.categories')}}">Categories</a>
      </div>
    </header>
  </head>
  <body>
    <div class="container">
          <div class="row">
            <div class="col-md-1">@yield('left')</div>
            <div class="col-md-10 content">
              @yield('content')
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
            </div>
            <div class="col-md-1">@yield('right')</div>
          </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <footer class="container-fluid text-right">
      Avis final project - Yosu Tanamachi Sánchez
    </footer>
  </body>
</html>
