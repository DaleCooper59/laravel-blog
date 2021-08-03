@extends('template')

@include('component/sidebar')
@section('h1')
<!--<div class="button flex justify-center mt-32 md:hidden">
    <button
        class=" flex justify-center bg-green-200 hover:bg-green-300 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
        <a href="{{ route('articles.create') }}"> Ecrire un article</a>
    </button>
</div>
-->
     <button
        class="md:absolute z-50 top-0 right-0 flex bg-green-200 hover:bg-green-300 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
        <a href="{{ route('articles.create') }}"> Ecrire un article</a>
    </button>

   

    <div class="container flex-1 p-4 flex justify-center static">
        <h1 class="text-indigo-300 text-center text-5xl py-24">Liste des articles</h1>

    </div>


@endsection

@section('content')

    <div class="container flex-1 mx-auto text-center">

        <br><br>
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has($msg))
                    <button
                        class="{{ $msg }} text-green-300 bg-tranparent border border-solid border-green-500 hover:bg-gray-300 hover:text-green-600 active:bg-gray-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">
                        {{ Session::get($msg) }}
                    </button>

                @endif
            @endforeach
        </div>
        <!-- This is an example component -->
        <div class="container w-full mx-auto my-5">
            <ul>
                @if ($articles->count() > 0)

                    @foreach ($articles as $article)
                        <div class="my-4">
                            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                                <div class="md:flex">
                                    <div class="md:flex-shrink-0">
                                        <img class="h-48 w-full object-cover md:w-48"
                                            src="https://source.unsplash.com/random" alt="A cat">
                                    </div>
                                    <div class="p-8">
                                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                                            {{ $article->id }}</div>
                                        <a href="{{ route('articles.show', $article->id) }}"
                                            class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $article->title }}</a>
                                        @if ($article->categories)
                                            @foreach ($article->categories as $item)
                                                @if ($item->name)
                                                    <a href="{{ route('categories.index') }}">
                                                        <h5>{{ $item->name }}</h5>
                                                    </a>

                                                @endif
                                            @endforeach
                                        @endif
                                        <p class="mt-2 text-gray-500 overflow-y-hidden">{{ $article->content }}</p>
                                        <p>{{ $article->authorID }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </ul>
        </div>
    @endsection
