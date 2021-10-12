<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('style')

    <title>@yield('title')</title>

{{--    @include('header')--}}
</head>
<body>
<div class="col" style="padding-top: 10px">
    @yield('content')
</div>
</body>

{{--@include('footer')--}}
</html>
