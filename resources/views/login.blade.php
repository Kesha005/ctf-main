<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
	

	</head>
	<body class="img js-fullheight" style="background-image: url(suratlar/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center mb-5">
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
					<h2 class="text-info"> Giriş</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-19">
					<div class="login-wrap p-0">
		      	    <form action="{{ route('login') }}" class="signin-form" method="post">
						@csrf
		      		<div class="form-group">
		      			<input name="email" type="text" class="form-control" placeholder="Ulanyjy ady" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Parol" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password bg-info"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Içeri Gir</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/main.js')}}"></script>

	</body>
</html>

