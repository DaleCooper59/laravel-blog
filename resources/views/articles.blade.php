@extends('template')

<div x-data="{open:true}" class="text-center ">

    @include('components/sidebar')

    @section('h1')

        <div class="flex-1 p-4 flex flex-col justify-center items-center h-4/5 static">
            <h1 class=" text-Cambridge_blue text-center text-5xl mt-32 lg:m-4 py-16">Liste des articles</h1>

            @include('components/button-create_article')


            <button class="lg:block hidden bg-Laurel_green hover:bg-tea_green text-white font-bold mt-8 py-2 px-4
                     border-b-4 border-black hover:border-gray-400 rounded" @click="open = !open">Menu</button>

            @include('components/search')
        </div>
    </div>

@endsection

@section('content')

    <div class="container flex-1 mx-auto text-center">

        @include('components/flashMessage')

        <div class="container w-full mx-auto my-5">
            <ul>
                @if ($articles->count() > 0)

                    @foreach ($articles as $article)
                        <div class="my-4 md:h-60 ">
                            <div class=" max-w-md mx-auto bg-white rounded-xl border-2 overflow-hidden md:max-w-2xl">
                                <div class="md:flex">
                                    <div class="md:flex-shrink-0">
                                        <img class="h-60 w-full object-cover md:w-48" 
                                        @if ($article->picture === 'no') 
                                                src="https://source.unsplash.com/random/"
                                            
                                        @else
                                                src="{{ Storage::url($article->picture) }}"
                                     @endif alt="A cat">
                                    </div>
                                    <div class="p-8 w-full">
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

                    {{$articles->links()}}
                @endif
            </ul>
        </div>
    @endsection
