@extends('template')

@section('content')
<div class="pull-right">
    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
</div>
    <h1>Liste des articles</h1>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<ul>
    @foreach ( $articles as $article)
              <li>{{ $article->id }}</li>
              <li>{{ $article->title }}</li>
              <li>{{ $article->authorID }}</li>
              <li>{{ $article->content }}</li>
            @endforeach
    
</ul>

@endsection