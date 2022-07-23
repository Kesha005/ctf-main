@extends('adminuser.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <center>
                <h2>Üýtget</h2>
            </center>
        </div>
        <div class="pull-right">
            <center> <a class="btn btn-primary" href="{{ route('teams') }}"> Yza</a></center>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Käbir ýalňyşlyk bar.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br>
<form action="{{ route('admin.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-19">
                <div class="login-wrap p-0">
                    <div class="form-group">
                        <strong>Ady:</strong>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Ady">
                    </div>

                    <div class="form-group">
                        <strong>Ulanyjy ady</strong>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Ulanjy ady">
                    </div>

                    <div class="form-group">
                        <strong>Parol</strong>
                        <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="parol">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Dowam et</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection