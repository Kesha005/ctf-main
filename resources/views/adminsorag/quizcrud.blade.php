<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Soraglar</title>

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
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <center>
                            <h3>Bölümiň soraglarynyň sanawy</h2>
                        </center>
                        <center>
                            <div class="pull-right">

                                <form method="post" action="{{route('destroy_quizcat',$id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Kategoriýany Aýyr</button>
                                </form>
                            </div>
                        </center>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{route('questions')}}"> Yza</a>
                        </div>
                    </div>
                </div>
            </div>

            @if($message=Session::get('success'))

            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <br>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Ady</th>
                    <th>Sorag</th>
                    <th>Jogap</th>
                    <th>Maglumat</th>
                    <th>Bal</th>
                    <th width="300px">Funksiya</th>
                </tr>
                @foreach($category as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->ady}}</td>
                    <td>{{$user->sorag}}</td>
                    <td>{{$user->jogap}}</td>
                    <td>{{$user->maglumat}}</td>
                    <td>{{$user->bal}}</td>
                    <td>
                        <form action="{{route('quiz_delete', $user->id)}}" method="post">
                            <a class="btn btn-primary" href="{{route('edit_quiz',$user->id)}}">Üýtget</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Aýyr</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        </form>
    </div>
    </div>

</body>

</html>