@extends('template')




@section('h1')
    <h1 class="text-3xl text_indigo-400">Article :{{ $article->title }}</h1>
@endsection

@section('content')

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('articles.index') }}"> Retour sur la liste des articles</a>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $article->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categorie:</strong>
                @if ($article->categories)
                    @foreach ($article->categories as $item)
                        @if ($item->name)
                            <a href="{{ route('categories.index') }}">
                                <h5>{{ $item->name }}</h5>
                            </a>

                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $article->content }}
            </div>
        </div>
    </div>

    <a href="{{ route('articles.edit', $article->id) }}"
        class="bg-violet-300 text-white active:bg-violet-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button">
        <i class="fas fa-heart"></i> Modifier l'article
    </a>

    <a href="{{ route('articles.destroy', $article->id) }}"
        class="bg-red-600 text-white active:bg-red-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button">
        <i class="fas fa-heart"></i> Effacer l'article
    </a>

    

    <section class="grid grid-cols-12 w-screen my-4 space-y-4">
         <article class="col-span-6 col-start-6 flex bg-gray-200 rounded space-x-3">
      
        <div>
            <img class="rounded m-1" src="https://i.pravatar.cc/100" alt="avatar">
        </div>

        <header>
            <h3 class="font-bold">
                John
            </h3>
            <p class="text-xs">posted 8 months ago</p>

        </header>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut omnis est repudiandae sit aspernatur in magni, quasi
            fugit culpa a, dolorum excepturi ab amet? Culpa repellendus sunt laboriosam dolor doloribus!</p>
  </article>
    </section>
    
    
@endsection
