<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Таймер на JavaScript</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
</head>

<body>
    <div id="year" class="year"></div>
    <div id="countdown" class="countdown">
        <div class="col-lg-3 d-flex align-items-stretch">
            <h2 id="days" hidden>00</h2>

            <h2 id="hours">00:</h2>
            <small>hours</small>
            <h2 id="minutes">00:</h2>
            <small>minutes</small>
            <h2 id="seconds">00</h2>
            <small>seconds</small>
        </div>
    </div>
    <a href="{{ route('users') }}" id="h" name="h" hidden></a>

    @include('layouts.script')

</body>
</html>