@extends('template')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <label>Whoops!</label> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@foreach ($article as $art)
    

    <form action="{{ route('articles.update',['id' => $art->id]) }}" method="POST">
        @csrf
      
   
         <div class="">
            <div class="">
                <div class="form-group">
                    <label>Titre de l'article</label>
                    <input type="text" name="title" value="{{ $art->title }}" class="form-control" placeholder="Titre">
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>Contenu</label>
                    <textarea class="form-control"  name="content" placeholder="contenu">{{ $art->content }}</textarea>
                </div>
            </div>
            <!--<div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>Catégorie</label>
                    <input type="text" name="category" value="" class="form-control" placeholder="Catégorie">
                </div>
            </div>-->
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>Image</label>
                    <textarea class="form-control"  name="picture" placeholder="image">{{ $art->picture }}</textarea>
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>slug</label>
                    <textarea class="form-control"  name="slug" placeholder="slug">{{ $art->slug }}</textarea>
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded text-center">
              <button type="submit" class="btn btn-primary">envoyer</button>
            </div>
        </div>
   
    </form>
@endsection
@endforeach