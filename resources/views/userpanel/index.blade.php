<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CTF</title>
</head>
@include('userpanel.component')

<body class="img js-fullheight" style="background-image: url('../img/bg.jpg');">
    <nav class="navbar navbar-expand-sm fixed-top  ">
        <div class="container">
            <button class="navbar-toggler pull-right bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ml-auto">
                    @if($user->status=='admin')
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="{{route('teams')}}">Admin</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('home')}}">Ýaryş</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="{{route('raiting')}}">Reýting</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ">
                    <a class="dropdown-item text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Çyk</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </nav><br><br>
    @if($message=Session::get('error'))
    <div class="alert alert-danger">
        <p>{{$message}}</p>
    </div>
    @elseif($message=Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    @if($date->status=='on_progress')
        <div class=" col-lg-11 text-right">
            <h2 id="days" hidden>00</h2>
            <h4 class="fas text-info" id="hours">00:</h4>
            <small class="fas text-light">sagat</small>
            <h4 id="minutes" class="fas text-info">00:</h4>
            <small class="fas text-light">minut</small>
            <h4 class="fas text-info" id="seconds">00</h4>
            <small class="fas text-light">sekunt</small><br>
            <a href="{{ route('game_over_admin') }}" id="h" name="h" hidden></a>
        </div>
    @include('layouts.user_script')
    @yield('content')


    @elseif($date->status=='retry')
    <br>
    <div class="text-center">
        <br><br>
        <h3 class="text-light">Ýaryş entek başlanok</h3>
    </div>
    @elseif($date->status=='end')
    <br>
    <div class="text-center">
        <br><br>
        <h3 class="text-light">Ýaryş tamamlandy netijeleri reýtingden görip bilersiňiz</h3>
    </div>

    @endif
</body>

</html>