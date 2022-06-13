<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">

    <title>{{$get_user->name}}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
</head>

<body>
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sr.js')}}"></script>
    <div class="wrapper">
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
        <div class="col-lg-7 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users') }}"> Yza</a>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <h2>Profilim</h2>
                        </div>
                        <div class="card-body pt-1">
                            <div class="row">
                                <div class="col-14">
                                    <h2 class="lead"><b>Ady: {{$get_user->name}}</b> </h2>
                                    <h4>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small mb-1">
                                                <span class="fa-li"><i class="fa fa-envelope"></i></span>
                                                {{$get_user->email}}
                                            </li>
                                            <li class="small mb-2">
                                                <span class="fa-li"><i class="fa-envelope"></i></span>
                                                <h2 class="lead">Baly: {{$get_user->score}}</h2>

                                            </li>
                                        </ul>
                                    </h4>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{asset('img/user.svg')}}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</body>
</div>
</div>
</div>

</body>

</html>