@extends('adminuser.layout1')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <center>
                <h3>Web saýtyň online agzalary</h2>
            </center>
        </div><br>
        <div class="pull-right">
            <center><a class="btn btn-success " href="{{ route('result_admin') }}"> Raiting</a></center>
        </div><br>
    </div>
</div>

@if($message=Session::get('success'))

<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Ady</th>
        <th>Email</th>
        <th>Ýagdaýy</th>
        <th width="300px">Funksiya</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->condition}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.show',[$user]) }}">Maglumat</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection