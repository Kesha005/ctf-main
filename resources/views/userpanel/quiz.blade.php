@extends('userpanel.questioncomp')
@section('blocks')
<div class="container mt-5">
    <div class="row">
        @foreach($category as $question)
        <div class="col-lg-3">
            <form method="post">
                @csrf
        @if( in_array(strval($question->id),$array_team_answer))
            <a href="{{route('quiz.show', $question->id)}}" class="card text-decoration-none text-white rounded-6 p-3 border-0 bg-success" disabled>
                <div class="card-title h5 mb-5">{{$question->ady}}</div>
                <div class="d-flex justify-content-between align-items-center">
                    <img src="../img/icon.png" class="img-fluid" style="width: 50px;">
                    <div class="card-title h1 font-weight-bold">{{$question->bal}}</div>
                </div>
            </a>
        @else
        <a href="{{route('quiz.show', $question->id)}}" class="card text-decoration-none text-white rounded-6 p-3 border-0 bg-dark">
            <div class="card-title h5 mb-5">{{$question->ady}}</div>
            <div class="d-flex justify-content-between align-items-center">
                <img src="../img/icon.png" class="img-fluid" style="width: 50px;">
                <div class="card-title h1 font-weight-bold">{{$question->bal}}</div>
            </div>
        </a>
        @endif
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
