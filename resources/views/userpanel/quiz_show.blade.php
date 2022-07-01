@extends('userpanel.index')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
        <div  class="card text-decoration-none text-white rounded-6 p-3 border-0 bg-dark">
            <div class=" fas-fa   mb-1">{{$question->ady}}
            <a href="{{ route('quizes',$question->category) }}"  class="btn btn-danger pull-right  " ><span>x</span></a>
        </div>
            <hr style="height:2px; width:100%; border-width:0; color:darkslategray; background-color:darkslategray">
            <div class="fas-fa  mb-3">{{$question->sorag}}</div><br>
            <form action="{{route('quiz-control')}}" method="post">
                @csrf
                <input type="text" name="jogap" class="form-control bg-dark" placeholder="Jogaby"> <br>
                <a href="{{route('download',$question->id)}}" class="btn btn-secondary pull-left"><i class="icon-download-alt"></i>Faýl ýükle</a><br>
               <button class="btn btn-success pull-right" id="button-addon2" name="data" value="{{$question}}">Barla</button>
            </form>
            
        </div>
        </div>
    </div>
</div>
@endsection