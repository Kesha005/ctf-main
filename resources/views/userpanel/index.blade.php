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
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
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
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>

                        @endif

                        @if (Route::has('register'))
                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif




                        @if($user->status=='admin')
                    <li><a class="  nav-link text-light " href="{{route('teams')}}">Admin Panel</a></li>
                    @endif
                    <li><a class=" nav-link text-light" href="{{route('user.profile')}}">Profil</a></li>
                    <li><a class=" nav-link text-light" href="{{route('raiting')}}">Reýting</a></li>
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
    </nav>
    <div>
        @if($date->status=='on_progress')
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
                </div>
                @include('layouts.user_script')
            </div>
        </div>
        <div class="container my-5">
            @if(count($categories)!=0)
            <div class="col-lg-0 text-center">
                <h3 class="fas">Testler</h3><br>
            </div>
            @endif
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-3 d-flex align-items-stretch">
                    <a href="{{route('sorag_user', $category->id)}}" class="card bg-dark text-decoration-none shadow-sm">
                        <img src="suratlar/{{$category->file_path}}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-light text-center">{{$category->category}}</h5>
                        </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div>


        <div class="container my-5">
            @if(count($categories1)!=0)
            <div class="col-lg-0 text-center">
                <h3 class="fas">Soraglar</h3>
            </div><br>
            @endif
            <div class="row">
                @foreach($categories1 as $category1)
                <div class="col-lg-3 d-flex align-items-stretch">
                    <a href="{{route('quizes', $category1->id)}}" class="card bg-dark text-decoration-none shadow-sm">
                        <img src="suratlar/{{$category1->file_path}}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-light text-center">{{$category1->category}}</h5>
                        </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div>
        @elseif($date->status=='retry')
        <br>
        <div class="text-center">
            <h3>Ýaryş entek başlanok</h3>
        </div>
        @elseif($date->status=='end')
        <br>
        <div class="text-center">
            <h3>Ýaryş tamamlandy netijeleri reýtingden görip bilersiňiz</h3>
        </div>
        @endif
    </div>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>