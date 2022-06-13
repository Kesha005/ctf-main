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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group text-center">
                <strong>Ady:</strong>
                <input type="text" name="name" class="form-control text-center" placeholder="Ady">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control text-center" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <strong>Parol:</strong>
                <input type="password" name="password" class="form-control text-center" placeholder="Parol">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <strong>Topar:</strong>
               <select name="team" id="team"  class="form-control text-center">
                   <option value="{{$ids}}" >{{$team[0]->name}}</option>
               </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Goş</button>
        </div>
    </div>

</form>
@endsection