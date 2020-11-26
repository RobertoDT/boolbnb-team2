<!DOCTYPE html>
<<<<<<< Updated upstream
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    @include('layouts.header')
<<<<<<< HEAD
=======
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield("title")</title>

  </head>

  <body>

    @include("layouts.header")

>>>>>>> Stashed changes
=======

>>>>>>> main
    <main>

      @yield('mainContent')
      
    </main>

    @include('layouts.footer')
</body>
</html>