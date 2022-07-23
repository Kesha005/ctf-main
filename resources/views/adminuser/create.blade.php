@extends('adminuser.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <center>
                <h2>Täze agza goş</h2>
            </center>
        </div>
        <div class="pull-right">
            <center> <a class="btn btn-primary" href="{{ route('teams') }}"> Yza</a></center>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ýalňyşlyk bar<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.store') }}" method="post">
    @csrf
    <br>

    <div class=" container">
        <div class="row justify-content-center">
            <div class="col-md-19">
                <div class="login-wrap p-0">
                    <form action="{{ route('admin.store') }}" method="post">
                        @csrf
                        <div class="form-group text-center">
                            <strong>Ady:</strong>
                            <input type="text" name="name" class="form-control text-center" placeholder="Ady">
                        </div>

                        <div class="form-group text-center">
                            <strong>Ulanyjy ady:</strong>
                            <input type="text" name="email" class="form-control text-center" placeholder="Ulanyjy">
                        </div>

                        <div class="form-group text-center">
                            <strong>Parol:</strong>
                            <input type="password" name="password" class="form-control text-center" placeholder="Parol">
                        </div>

                        <div class="form-group text-center">
                            <strong>Topar:</strong>
                            <select name="team" id="team" class="form-control text-center">
                                <option value="{{$ids}}">{{$team[0]->name}}</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Goş</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @endsection