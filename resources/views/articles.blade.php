@extends('template')

<div x-data="{open:true}" class="text-center ">

    @include('components/sidebar')

    @section('h1')




        <div class="container flex-1 p-4 flex flex-col justify-center items-center h-4/5 static">
            <h1 class=" text-indigo-300 text-center text-5xl mt-32 lg:m-4 pt-16">Liste des articles</h1>

            @include('components/button-create_article')


            <button
                class="lg:block hidden bg-green-400 hover:bg-green-500 text-white font-bold m-3 py-2 px-4 border-b-4 border-green-800 hover:border-green-700 rounded"
                @click="open = !open">Menu</button>

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
