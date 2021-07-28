@extends('template')

@section('content')

    <div class="card uper">
        <div class="card-header">
        @section('h1')
            <h1 class="text-indigo-300">Ajouter un article</h1>
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

        <form method="post" action="{{ route('articles.store') }}">
            . @csrf
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="title">
                            Titre
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="title" type="text" name="title" placeholder="Jane">

                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="categories">
                            Catégorie
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="category" name="category">

                                @foreach ($category as $c)

                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                                    <option value="autre">Autre</option>
                            </select>
                            <div
                                class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="md:w-1/2 px-3">
                  <label for="content"> Contenu</label>
                    <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"
                        id="content" name="content">
                           
                        </textarea>

                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="picture">
                            Image
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                            id="picture" name="picture" type="text" >

                    </div>
                </div>
                <div class="-mx-3 md:flex mb-2">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-city">
                            Slug
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="grid-city" name="slug" type="text" placeholder="Albuquerque">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Publier</button>
            </div>
        </form>

    </div>
</div>
@endsection
