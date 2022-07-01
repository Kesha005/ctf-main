@extends('userpanel.index')
@section('content')
<br><br>
<div class="container my-7">
    <div class="row">
    @foreach($categories1 as $category1)
        <div class="col-lg-2">
            <a class=" text-light"  href="{{route('quizes', $category1->id)}}">{{$category1->category}}</a> 
        </div>
    @endforeach
    </div>
     <hr style="height:2px; width:100%; border-width:0; color:darkslategray; background-color:darkslategray"><br>
</div>


@yield('blocks')


@endsection
   



