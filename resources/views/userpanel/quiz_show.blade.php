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


                    <li><a class="nav-link text-light" href="{{route('user.profile')}}">Profil</a></li>
                    <li><a class="nav-link text-light" href="{{route('raiting')}}">Reýting</a></li>
                    <a class="  nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Ulgamdan çyk
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav><br>
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('quizes',$question->category) }}"> Yza</a>
        </div>
    </div>
    </div>
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
                <a href="{{ route('game_over_admin') }}" id="h" name="h" hidden></a>
            </div>
            @include('layouts.user_script')
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <nav class="  navbar navbar-expand-lg navbar-light bg-info shadow-sm">
                        <div class="card-body">
                            <h4 class="text-center mb-1 ">{{$question->ady}}</h4>
                    </nav>
                    <div class="card-body">
                        <h4 class="text-center mb-1">{{$question->bal}} ballyk sorag</h4>
                        <p class="font-weight-bold mb-2">
                            Sorag : <span class="text-left">{{$question->sorag}}</span>
                        </p><br>
                        <textarea name="text" id="text" cols="30" class="form-control" rows="5" disabled>{{$question->maglumat}}</textarea><br>
                        <form action="{{route('quiz-control')}}" method="post">
                            @csrf
                            <input type="text" name="jogap" class="form-control" placeholder="Jogaby"> <br>
                            <a href="{{route('download',$question->id)}}" class="btn btn-info pull-left"><i class="icon-download-alt"></i>Faýl ýükle</a><br>
                            <center><button class="btn btn-success" id="button-addon2" name="data" value="{{$question}}">Barla</button></center>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>