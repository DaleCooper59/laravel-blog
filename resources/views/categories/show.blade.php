@extends('template')

@section('content')
    <h2 class="text-3xl text-center pt-10 font-bold">Catégorie : {{ $category->name }}</h2>

    <br><br>
    <a href="{{ route('categories.index') }}"
        class="bg-violet-300 text-white active:bg-violet-300 font-bold uppercase w-20 text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button">Revenir
    </a>
    <br>
    <div class="flex items-center justify-center min-h-screen">
        <div class="col-span-12">
            <div class="overflow-auto lg:overflow-visible ">
                <table class="table text-gray-400 border-separate space-y-6 text-sm">
                    @foreach ($article as $a)
                        <div class="space-y-3">
                            <span class="bg-Cambridge_blue rounded-bl-md px-2"><a href="{{route('articles.show', $a->id)}}">{{ $a->title }}</a> </span>
                            <p class="">{{ $a->content }}</p>
                        </div>
                        <hr class="mb-4">

                    @endforeach
                </table>
            </div>
        </div>
    </div>
    

@endsection
