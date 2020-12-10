<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />
    <title>@yield('title')</title>
</head>
<body>

    <main>

      @yield('mainContent')

    </main>

    @include('layouts.footer')

    <!-- <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script> -->

  <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
