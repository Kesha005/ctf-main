@extends('adminuser.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <center>
                <h2>Täze topar goş</h2>
            </center>
        </div>
        <div class="pull-left">        
         <a class="btn btn-primary" href="{{ route('teams') }}"> Yza</a>
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

<form action="{{ route('save_team') }}" method="post">
    @csrf
    <div class="continer">
        <div class="row justify-content-center">
            <div class="form-group text-center">
                <strong>Ady:</strong>
                <input type="text" name="name" class="form-control text-center" placeholder="Ady">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Goş</button>
            </div>
        </div>
    </div>
</form>
@endsection