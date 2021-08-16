@extends('template')

@section('content')
<div class="abolute left-1 top-1">
    <a href="{{route('articles.index')}}" >
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
      </svg>
</a>
</div>


    <div class="card uper">
        <div class="card-header">
        @section('h1')
            <h1 class="mt-16 text-3xl text-center text-Cambridge_blue">Ajouter un article</h1>
        @endsection
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif

        <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            . @csrf
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2"
                            for="title">
                            Titre
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-lighter text-gray-400 border border-red rounded py-3 px-4 mb-3"
                            id="title" type="text" name="title" placeholder="Jane" value="{{ old('title') }}">

                        @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2"
                            for="categories">
                            Catégorie
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-lighter border border-grey-lighter text-gray-400 py-3 px-4 pr-8 rounded"
                                id="category" name="category" value="{{ old('category') }}">

                                @foreach ($category as $c)

                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                                <option value="autre">Autre</option>

                            </select>

                        </div>
                        @error('category')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class=" px-3">
                    <label for="content" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        Contenu</label>
                    <textarea class="w-full py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"
                        id="content" name="content" value="{{ old('content') }}" placeholder="Ecrivez votre article">

                        </textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="picture">
                            Image
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="picture" name="picture" type="file" value="{{ old('picture') }}">

                    </div>
                </div>
                <div class="-mx-3 mb-2">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-city">
                            Slug
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="grid-city" name="slug" type="text" value="{{ old('slug') }}" placeholder="Albuquerque">

                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="grid-city" name="user_id" type="hidden" value="{{ $author->id }}">
                    </div>

                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-Cambridge_blue hover:bg-Laurel_green hover:text-white text-black font-bold w-40 m-10 py-2 px-4 rounded-full">Publier</button>

                </div>
            </div>
        </form>

    </div>
</div>
@endsection
