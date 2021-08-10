@extends('template')

@section('content')
<h2 class="text-3xl font-bold">Catégorie : {{$category->name}}</h2>
<br><br>
@foreach ($article as $a)
<div class="space-y-3">
     <p class="bg-gray-300">{{$a->title}}</p>
    <p>{{$a->content}}</p>
</div>
   <span>******************</span>
    
@endforeach

  <a href="{{route('categories.index')}}"  
        class="bg-violet-300 text-white active:bg-violet-300 font-bold uppercase w-20 text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button">Revenir
    </a>
    
@endsection