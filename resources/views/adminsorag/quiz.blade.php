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
                    <a class="dropdown-item" href="">
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
            <div class="content-header">
                <div class="container">
                    <div class="row my-3 justify-content-between align-items-center">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{route('questions')}}"> Yza</a>
                        </div>
                        <div class="col-lg-12 text-center">
                            <h1 class="m-0 text-dark">Soraglar Goş</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content mt-5">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-8">
                            <form action="{{route('store_quiz')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Ady</label>
                                    <input name="ady" type="text" class="form-control" placeholder="Ady">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Sorag</label>
                                    <input name="sorag" type="text" class="form-control" placeholder="Sorag">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Jogap</label>
                                    <input name="jogap" type="text" class="form-control" placeholder="Jogap">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Maglumat</label>
                                    <input name="maglumat" type="text" class="form-control" placeholder="Maglumat">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Bal</label>
                                    <input name="bal" type="text" class="form-control" placeholder="Bal">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Faýl al(.txt format)</label>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input " id="inputGroupFile01" aria-describedby="inputGroupFileAddon01 ">
                                        <label class="custom-file-label " for="inputGroupFile01 ">Sayla</label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Kategoriýa</label>
                                    <select name="category" id="tcategory" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Goş</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>