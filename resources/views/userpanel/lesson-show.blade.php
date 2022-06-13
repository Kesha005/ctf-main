<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">

    <title>Soraglar</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
</head>

<body>
    <nav class="  navbar navbar-expand-lg navbar-light bg-dark shadow-sm">
        <div class="  container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-5">
                        @guest
                        @if (Route::has('login'))
                        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>

                        @endif

                        @if (Route::has('register'))
                        <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif

                        @else
                    <li><a class="nav-link text-light" href="{{route('user.profile')}}">Profil</a></li>
                    <li><a class="nav-link text-light" href="{{route('raiting')}}">Reýting</a></li>
                    <li><a class="nav-link text-light" href="{{ route('users') }}">Yza</a></li>
                    <a class="  nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Ulgamdan çyk
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav><br>
    <center>
        <h3 class="fa">Testler</h3>
    </center>
    <br>
    @if($message=Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    @if($message=Session::get('error'))
    <div class="alert alert-danger">
        <p>{{$message}}</p>
    </div>
    @endif
    <br>
    <div class="text-right">
        <div id="year" class="year"></div>
        <div id="countdown" class="countdown">
            <div class=" col-lg-11 text-right">
                <h2 id="days" hidden>00</h2>
                <h4 class="fas" id="hours">00:</h4>
                <small class="fas">sagat</small>
                <h4 id="minutes" class="fas">00:</h4>
                <small class="fas">minut</small>
                <h4 class="fas" id="seconds">00</h4>
                <small class="fas">sekunt</small><br>
                <a href="{{ route('game_over_user') }}" id="h" name="h" hidden></a>
            </div>
            @include('layouts.user_script')
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @foreach($category as $question)
            <div class="col-lg-3">
                <form method="post">
                    @csrf
                    @if( in_array(strval($question->id),$array_answer_team))
                    <a href="{{route('question', $question->id)}}" class="card bg-success text-decoration-none shadow-sm disabled">
                        <div class="card-body">
                            <h5 class="card-title text-light text-center">{{$question->ady}}</h5>
                            <h5 class="card-title text-light text-center">{{$question->bal}}</h5>
                        </div>
                    </a>
                    <br>
                    @elseif( in_array(strval($question->id),$array_wrong))
                    <style>
                        .disabled {
                            pointer-events: none;
                            cursor: default;
                        }
                    </style>
                    <a href="{{route('question', $question->id)}}" class="card bg-danger text-decoration-none shadow-sm disabled">
                        <div class="card-body">
                            <h5 class="card-title text-light text-center">{{$question->ady}}</h5>
                            <h5 class="card-title text-light text-center">{{$question->bal}}</h5>
                        </div>
                    </a>
                    <br>
                    @else
                    <a href="{{route('question', $question->id)}}" class="card bg-dark text-decoration-none shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-light text-center">{{$question->ady}}</h5>
                            <h5 class="card-title text-light text-center">{{$question->bal}}</h5>
                        </div>
                    </a>
                    <br>
                    @endif
            </div>
            </form>
            @endforeach
        </div>
    </div>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>