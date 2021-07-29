@extends('template')

@section('h1')
    <div class="container p-4 flex flex-row justi">
        <h1 class="text-indigo-300 text-center text-5xl">Liste des articles</h1>
        <button
            class="bg-green-200 hover:bg-green-300 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
            <a href="{{ route('articles.create') }}"> Ecrire un article</a>
        </button>
    </div>
@endsection

@section('content')
    <div class="container mx-auto text-center">


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
        <div class="container mx-auto my-5">
            @if ($articles->count() > 0)

                @foreach ($articles as $article)
                
                    <ul>
                        <div class="relative rounded-lg flex flex-col md:flex-row items-center md:shadow-xl md:h-72 mx-2">

                            <div
                                class="z-0 order-1 md:order-2 relative w-full md:w-2/5 h-80 md:h-full overflow-hidden rounded-lg md:rounded-none md:rounded-r-lg">
                                <div class="absolute inset-0 w-full h-full object-fill object-center bg-blue-400 bg-opacity-30 bg-cover bg-bottom"
                                    style="background-image: url( https://images.unsplash.com/photo-1525302220185-c387a117886e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80 ); background-blend-mode: multiply;">
                                </div>
                                <div
                                    class="md:hidden absolute inset-0 h-full p-6 pb-6 flex flex-col-reverse justify-start items-start bg-gradient-to-b from-transparent via-transparent to-gray-900">
                                    <h3 class="w-full font-bold text-2xl text-white leading-tight mb-2"></h3>
                                    <h4 class="w-full text-xl text-gray-100 leading-tight"></h4>
                                    <p class="text-gray-600 text-justify"></p>
                                </div>
                                <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-white -ml-12"
                                    viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <polygon points="50,0 100,0 50,100 0,100" />
                                </svg>
                            </div>

                            <div class="z-10 order-2 md:order-1 w-full h-full md:w-3/5 flex items-center -mt-6 md:mt-0">
                                <div
                                    class="overflow-hidden p-8 md:pr-18 md:pl-14 md:py-12 mx-2 md:mx-0 h-full bg-white rounded-lg md:rounded-none md:rounded-l-lg shadow-xl md:shadow-none">
                                    <h4 class="hidden md:block text-xl text-gray-400"> {{ $article->id }}</h4>
                                    <a href="{{ route('articles.show', $article->id) }}">
                                        <h3 class="hidden md:block font-bold text-2xl text-gray-700">{{ $article->title }}</h3>
                                    </a>
                                    @if($article->category)
                                    <a href="{{route('categories.index')}}"><h5>{{ $article->category->name}}</h5></a> 
                                    @endif


                                    <p>{{ $article->content }}</p>

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
