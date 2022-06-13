@extends('adminsorag.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <center>
                <h3>Bölümiň soraglarynyň sanawy</h2>
            </center>
            <center>
                <div class="pull-right">

                    <form method="post" action="{{route('destroy.category',$id)}}">
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
        <th>Barlag1</th>
        <th>Barlag2</th>
        <th>Bal</th>
        <th width="300px">Funksiya</th>
    </tr>
    @foreach($category as $user)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$user->ady}}</td>
        <td>{{$user->sorag}}</td>
        <td>{{$user->jogap}}</td>
        <td>{{$user->barlag1}}</td>
        <td>{{$user->barlag2}}</td>
        <td>{{$user->bal}}</td>
        <td>
            <form action="{{route('question_delete', $user->id)}}" method="post">
                <a class="btn btn-info" href="{{ route('question_show',$user->id) }}">Maglumat</a>
                <a class="btn btn-primary" href="{{route('question_edit',$user->id)}}">Üýtget</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Aýyr</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



@endsection