<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Soraglar</title>

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.solid.min.css')}}">
</head>

<body class="hold-transistion sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="p-2 pt-3 d-flex text-dark" data-widget="pushmenu" href="{{route('signout')}}"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="dropdown-item" href="{{route('signout')}}">
                        <i class="fas fa-sign-out-alt" title="Ulgamdan çyk"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="info">
                        <a href="{{route('teams')}}" class="d-block text-uppercase">ADMIN PANEL</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('teams')}}" class="nav-link">
                                <i class="fas fa-user mr-1"></i>
                                <p> Ulanyjylar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('questions')}}" class="nav-link active">
                                <i class="fas fa-file-alt mr-1"></i>
                                <p> Soraglar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('monitoring')}}" class="nav-link">
                                <i class="fas fa-home mr-1"></i>
                                <p> Monitoring </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>



        <div class="content-wrapper">
            <div>
                @if($date->status=='retry')
                <div class="content-header">
                    <nav class="  navbar navbar-expand-lg navbar-light bg-dark shadow-sm">
                        <div class="container">
                            <button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item mr-5">

                                    <li><a class=" nav-link text-light" href="{{route('create_category')}}">Kategoriýa goş</a></li>
                                    <li><a class=" nav-link text-light" href="{{route('create_quiz')}}">Sorag goş</a></li>
                                    <li><a class=" nav-link text-light" href=" {{route('create_question')}}">Test goş</a></li>


                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="container">
                        <div class="col-lg-0 text-center">
                            <h1 class="m-3 text-dark">Soraglar we testler</h1>
                        </div>
                        <br>
                        <div class="col-lg-0 text-center ">
                            <div style="background-color:red">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </div><br>
                            <form action="{{route('time_post')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-2">
                                        <input type="text" name="time" class="form-control text-center" placeholder="wagt (minutda)">
                                    </div>
                                    <button type="submit" class="btn btn-success">Oýuny Başlat</button><br>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-0 text-center ">
                                        <input type="checkbox" name="test_on" value="test_on" checked> Test</input>
                                    </div><br>
                                    <div class="col-lg-2 text-center ">
                                        <input type="checkbox" name="quiz_on" value="sowal_on" checked disabled> Sowallar</input>
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>

                </div>

                <section class="content">
                    <div class="container my-5">
                        @if(count($categories)!=0)
                        <div class="col-lg-0 text-center">
                            <h3 class="fas">Testler</h3><br>
                        </div>
                        @endif
                        <div class="row">
                            @foreach($categories as $category)
                            <div class="col-lg-3 d-flex align-items-stretch">
                                <a href="{{route('sorag_configuration', $category->id)}}" class="card bg-dark text-decoration-none shadow-sm">
                                    <img src="suratlar/{{$category->file_path}}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title text-light text-center">{{$category->category}}</h5>
                                    </div>
                                </a>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container my-5">
                        @if(count($categories1)!=0)
                        <div class="col-lg-0 text-center">
                            <h3 class="fas">Sowallar</h3><br>
                        </div><br>
                        @endif
                        <div class="row">
                            @foreach($categories1 as $category1)
                            <div class="col-lg-3 d-flex align-items-stretch">
                                <a href="{{route('quizconfig', $category1->id)}}" class="card bg-dark text-decoration-none shadow-sm">
                                    <img src="suratlar/{{$category1->file_path}}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title text-light text-center">{{$category1->category}}</h5>
                                    </div>
                                </a>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </section><b
            @elseif($date->status=='on_progress')
                <br>
                <div id="year" class="year"></div>
                <div id="countdown" class="countdown">
                        <div class="text-center">
                            <h2 id="days" hidden>00</h2>
                            <h4 class="fas" id="hours">00:</h4>
                            <small class="fas">sagat</small>
                            <h4 id="minutes" class="fas">00:</h4>
                            <small class="fas">minut</small>
                            <h4 class="fas" id="seconds">00</h4>
                            <small class="fas">sekunt</small><br>
                            <a class="btn btn-danger" href="{{route('end_game')}}">Ýaryşy tamamla</a>
                        </div>
                    @include('layouts.script')
                </div>
                @elseif($date->status=='end')
                <div class="text-center">
                    <br>
                    <h4 class="fas">Ýaryş tamamlandy netijeleri monitoring bölüminde görüp bilersiňiz</h4><br>
                    <a class="btn btn-success" href="{{route('new_game')}}">Täze möwsüm başlat</a>
                </div>


                @endif
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>