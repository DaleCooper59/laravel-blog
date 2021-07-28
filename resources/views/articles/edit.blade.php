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



    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
      
   
         <div class="">
            <div class="">
                <div class="form-group">
                    <label>Titre de l'article</label>
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control" placeholder="Titre">
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>Contenu</label>
                    <textarea class="form-control"  name="content" placeholder="contenu">{{ $article->content }}</textarea>
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>Catégorie</label>
                    <Select  class="form-control" name="category">
                        @foreach ($category as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                      
                    </Select>
                    
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>Image</label>
                    <textarea class="form-control"  name="picture" placeholder="image">{{ $article->picture }}</textarea>
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded">
                <div class="form-group">
                    <label>slug</label>
                    <textarea class="form-control"  name="slug" placeholder="slug">{{ $article->slug }}</textarea>
                </div>
            </div>
            <div class="bg-indigo-300 hover:bg-indigo-500 font-bold py-2 px-4 rounded text-center">
              <button type="submit" class="btn btn-primary">envoyer</button>
            </div>
        </div>
   
    </form>
@endsection
