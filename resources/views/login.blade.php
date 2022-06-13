<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Içeri gir</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('register')}}">Hasap aç</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center ">
            <div class="col-lg-7 ">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ünsli bol</strong> Ýalňyşlyk bar<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('login') }}" class="border p-3 px-5 shadow-sm bg-light">
                    @csrf
                    <h5 class="text-center mb-5">Içeri gir</h5>
                    <div class="form-group mb-4">
                        <input type="email" id="inputUsername" class="form-control" placeholder="E-mail adresi" name="email" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" autocomplete="off" required>
                    </div>
                    <center><button type="submit" class="btn btn-primary mb-5 text-center">Içeri gir</button></center>
                    <h5 class="text-center mb-5">Eger siziň hasabyňyz ýok bolsa hasap açyň</h5>
                </form>
            </div>
        </div>
    </div>


    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>