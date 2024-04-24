<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel Reservation System</title>

        <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/css/mdb.min.css')}}"><!-- comment -->
        <link rel="stylesheet" href="{{ asset('resources/css/style.min.css')}}"><!-- comment -->
        
        
    </head>
    <body class="antialiased">
       @include('layouts.navbar')
       @yield('content')
       @include('layouts.footer')
       
       
       
       
       
       
       
       
       
       <script type='text/javascript' src="{{ assset('resources/js/jquery-3.4.1.min.js')}}"></script>
       <script type='text/javascript' src="{{ assset('resources/js/popper.min.js')}}"></script>
       <script type='text/javascript' src="{{ assset('resources/js/bootstrap.min.js')}}"></script>
       <script type='text/javascript' src="{{ assset('resources/js/mdb.min.js')}}"></script>
    </body>
</html>
