<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hasap aç</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login')  }}">Içeri gir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7">
           
                <form method='post' action="{{ route('register')  }}" class="border p-3 px-5 shadow-sm">
                    @csrf
                    <h5 class="text-center mb-5">Hasap Aç</h5>
                    <div class="form-group mb-4">
                        <input type="name" id="inputUsername" class="form-control" placeholder="Ady " name="name" autocomplete="off" required>
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <input type="email" id="inputUsername" class="form-control" placeholder="E-mail adresi" name="email" autocomplete="off" required>
                        @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" autocomplete="off" required>
                        @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirim Password" name="password_confirmation" autocomplete="off" required>
                    </div>
                    <center><button type="submit" class="btn btn-primary mb-5">Hasaba al</button></center>
                </form>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>