<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel Reservation System</title>

        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
        rel="stylesheet"
        />

        <!-- Jquerry -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!--meta tags for SEO-->
        <meta name="description" content="Discover unparalleled luxury and comfort at our exquisite hotel nestled in the heart of Montreal, Canada. Indulge in breathtaking views, world-class amenities, and personalized service that caters to your every need. Whether you're here for business or leisure, immerse yourself in a haven of tranquility and sophistication. Book your unforgettable stay with us today.">
        <meta name="keywords" content="hotel, accommodation, city name, country name, amenities, unique selling points">
        <meta name="robots" content="index, follow">

    </head>
    <body class="antialiased min-vh-100 d-flex flex-column">
       @include('layouts.navbar')
       @yield('content')
       @include('layouts.footer')
       
       
       
       
       
       
         

       <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
        ></script>
    </body>
</html>
