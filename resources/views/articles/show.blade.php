@extends('template')




@section('h1')
    <div class="p-2 bg-green-100 h-20">
        <h1 class=" text-3xl text-center text-Cambridge_blue"> {{ $article->title }}</h1>
    </div>

@endsection

@section('content')
    @include('../components/flashMessage')

    <div class="p-1">
        <a class="flex pl-6" href="{{ route('articles.index') }}"> Articles
            <svg class="ml-1 text-Laurel_green h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg></a>

    </div>



    <div class="max-w-2xl mx-auto py-4 px-8 bg-white shadow-lg rounded-lg my-20">
        <img 
        @if ($article->picture === 'no') 
        src="https://source.unsplash.com/random/" 
            @else
            src="{{ Storage::url($article->picture) }}"
            @endif alt="">

        <div class="shadow-shadowArticle p-5 text-center">
            <h2 class="text-gray-800 text-xl font-semibold">{{ $article->title }}</h2>
            <div class="flex justify-center md:justify-end -mt-16">
               
                <img class="w-20 h-20 object-cover rounded-full border-2 border-Laurel_green"
                @if($article->users->avatar === 'no-avatar')
                    src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                    
                @else
                src="{{ Storage::url($article->users->avatar) }}"
                @endif
            >
                </div>
            <span>
                @if ($article->categories)
                    @foreach ($article->categories as $item)
                        @if ($item->name)
                            <a href="{{ route('categories.index') }}">
                                <h5>{{ $item->name }}</h5>
                            </a>

                        @endif
                    @endforeach
                @endif
            </span>
            <p class="mt-2 text-gray-600">{{ $article->content }}</p>
        </div>
        <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-Cambridge_blue">
                {{ $article->users->name }}
            </a>
        </div>

        @auth
            <a href="{{ route('articles.edit', $article->id) }}"
            class="text-violet-300 active:bg-violet-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button">
            <i class="fas fa-heart"></i> Modifier l'article
        </a>

        <a href="{{ route('articles.destroy', $article->id) }}"
            class="text-red-600 active:bg-red-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button">
            <i class="fas fa-heart"></i> Effacer l'article
        </a>

        @can('approval')
            <a href="{{ route('comments.approval', $article->id) }}"
            class="text-red-600 active:bg-red-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button">
            <i class="fas fa-heart"></i> Approuver les commentaires
        </a>
        @endcan
         @endauth
    </div>

    @auth
        @include('../components/comment')


    @else
        <p class="text-right pr-14">
            <a class="text-red-400" href="{{ route('sessions.login') }}">Connectez vous pour commenter</a>
            ou
            <a class="text-red-400" href="{{ route('registers.create') }}">S'inscrire</a>
        </p>

    @endauth

    @include('../components/comments')


@endsection
