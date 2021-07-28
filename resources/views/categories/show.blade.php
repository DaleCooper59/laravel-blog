@extends('template')

@section('content')
<h2 text-xl>{{$category->name}}</h2>
@foreach ($article as $a)
    <p>{{$a->title}}</p>
    <p>{{$a->content}}</p>
    
@endforeach

  <a href="{{route('categories.index')}}"  
        class="bg-violet-300 text-white active:bg-violet-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button">Revenir
    </a>
    
@endsection