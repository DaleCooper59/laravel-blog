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

    <div class="flex items-center h-screen w-full bg-teal-lighter">
        <div class="w-full bg-gray-100 rounded shadow-lg p-8 md:max-w-xl md:mx-auto">
            <h1 class="block w-full text-2xl text-center text-Cambridge_blue mb-6">Pour modifier l'article c'est par ici
            </h1>

            <form class="mb-4 md:flex md:flex-wrap md:justify-between"
                action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col mb-4 w-full">
                    <label class="mb-2 uppercase tracking-wide font-bold text-lg text-grey-darkest">
                        Titre de l'article</label>
                    <input type="text" name="title" value="{{ $article->title }}"
                        class="border py-2 px-3 text-grey-darkest md:mr-2" placeholder="Titre">
                </div>

                <div class="flex flex-col mb-4 md:w-full">
                    <label class="mb-2 uppercase font-bold text-lg text-grey-darkest md:ml-2">Contenu</label>
                    <textarea class="form-control" cols="60" rows="6" name="content"
                        placeholder="contenu">{{ $article->content }}</textarea>
                </div>

                <div class="flex flex-col mb-4 md:w-1/2">
                    <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">Catégorie</label>
                    <Select class="border py-2 px-3 text-grey-darkest md:mr-2" name="category">
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach

                    </Select>
                </div>

                <div class="flex flex-col mb-4 md:w-1/2">
                    <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">Image</label>
                    <input type="file" class="form-control" name="picture" placeholder="image" value="{{ $article->picture }}">
                </div>

                <div class="flex flex-col mb-4 w-full">
                    <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">slug</label>
                    <input type="text class="w-full" name="slug" placeholder="slug" value="{{ $article->slug }}">
                </div>

                <div class="">
                    <button class="block bg-Laurel_green hover:bg-gray-200 text-white uppercase text-lg mx-auto p-2 rounded"
                        type="submit">Envoyer</button>
                </div>


            </form>
        </div>
    </div>
@endsection
