<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sorag barada</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
</head>

<body class="hold-transistion sidebar-mini layout-fixed">
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
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
                            <a href="{{route('teams')}}" class="nav-link active">
                                <i class="fas fa-user mr-1"></i>
                                <p> Ulanyjylar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('questions')}}" class="nav-link">
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
            <div class="content-header">
                <div class="container">
                    <div class="row my-3">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{route('sorag_configuration',$user->category)}}"> Yza</a>
                        </div>
                        <div class="col-lg-12 text-center">
                            <h1 class="m-0 text-dark">Sorag</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-4">
                                    <h2>Giňişleýin Maglumat</h2>
                                </div>
                                <div class="card-body pt-3">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead "><b>Ady: {{$user->ady}}</b> </h2>
                                            <h2 class="lead "><b>Sorag: {{$user->sorag}}</b> </h2>
                                            <h4>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small mb-2">
                                                        <span class="fa-li"><i class="fa fa-envelope"></i></span>
                                                        Jogap: {{$user->jogap}}
                                                    </li>
                                                    <li class="small mb-2">
                                                        <span class="fa-li"><i class="fa fa-envelope"></i></span>
                                                        Barlag1: {{$user->barlag1}}
                                                    </li>
                                                    <li class="small mb-2">
                                                        <span class="fa-li"><i class="fa fa-envelope"></i></span>
                                                        Barlag2: {{$user->barlag2}}
                                                    </li>
                                                    <li class="small mb-2">
                                                        <span class="fa-li"><i class=" fa fa-envelope"></i></span>
                                                        Baly: {{$user->bal}}

                                                    </li>

                                                </ul>
                                            </h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

</html>