<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
  </head>
  <body class="goto-here">
		
    {{-- start navbar --}}
    @include('client_layout.navbar')
    {{-- end navbar --}}

    {{-- start content --}}
    @yield('content')
    {{-- end content --}}

    {{-- start footer --}}
    @include('client_layout.footer')
    {{-- end footer --}}
    

  <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/scrollax.min.js') }}"></script>
  <script src="{{ asset('assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false') }}"></script>
  <script src="{{ asset('assets/frontend/js/google-map.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

  @yield('scripts')
    
  </body>
</html>