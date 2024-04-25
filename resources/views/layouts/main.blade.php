<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel Reservation System</title>

        <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/css/mdb.min.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/css/style.min.css')}}">
        
        
    </head>
    <body>
       @include('layouts.navbar')
       @yield('content')
       @include('layouts.footer')
       
       
       
       
       
       
       
       
       
       <script type='text/javascript' src="{{ asset('resources/js/jquery-3.4.1.min.js')}}"></script>
       <script type='text/javascript' src="{{ asset('resources/js/popper.min.js')}}"></script>
       <script type='text/javascript' src="{{ asset('resources/js/bootstrap.min.js')}}"></script>
       <script type='text/javascript' src="{{ asset('resources/js/mdb.min.js')}}"></script>
    </body>
</html>
