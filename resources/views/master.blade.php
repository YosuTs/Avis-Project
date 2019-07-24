<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    {{-- <link rel="stylesheet" href="{{public_path('css/style.css')}}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style media="screen">
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-weight: 100;
        height: 100vh;
        margin: 0;
        padding: 25px;
    }
    .form{
      border: 1px solid;
      margin-top: 25%;
    }
    button{
      line-height: 15px;
    }
    </style>
  </head>
  <body>
    <div class="container">
          @yield('content')
    </div>
  </body>
</html>
