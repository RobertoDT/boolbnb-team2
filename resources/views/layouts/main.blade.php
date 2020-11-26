<!DOCTYPE html>
<<<<<<< Updated upstream
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.header')
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
    <main>
        @yield('mainContent')
    </main>
    @include('layouts.footer')
</body>
</html>