<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel Reservation System</title>

        <link rel="stylesheet" href="{{ asset('../resources/css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('../resources/css/mdb.rtl.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    </head>
    <body class="antialiased">
       @include('layouts.navbar')
       @yield('content')
       @include('layouts.footer')
       
       
       
       
       
       
       
       
       

       <script type='text/javascript' src="{{ asset('../resources/js/mdb.es.min.js')}}"></script>
       <script type='text/javascript' src="{{ asset('../resources/js/mdb.umd.min.js')}}"></script>
    </body>
</html>
