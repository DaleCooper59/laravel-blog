@extends('template')

@section('content')
    <div class="container flex-1 mx-auto text-center">

            @section('h1')
                <h1 class="text-3xl text-center">
                    Les catégories d'article
                </h1>
            @endsection

            @include('components/flashMessage')

            <div class="container w-full min-h-screen mx-auto my-5 flex flex-col items-center justify-center space-y-20 bg-gray-50">
                <a href="{{ route('articles.index') }}"
                    class="bg-violet-100 hover:bg-violet-200 text-white active:bg-violet-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">
                    <i class="fas fa-heart"></i> Revenir aux articles
                </a>
                <br><br>
                <table class="table text-gray-400 border-separate space-y-6 text-sm">

                    <thead class="bg-gray-800 text-gray-500">
                        <tr class="bg-green-200">
                            <th scope="col" class=" text-2xl">Catégories</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)

                            <tr >
                                <th id="aa" scope="row">N°</th>
                                <td class=" text-2xl cursor-pointer bg-Cambridge_blue bg-opacity-50 rounded-full mr-2"> <a 
                                        href="{{ route('categories.show', $category->id) }}">{{ $category->id }}</a> 
                                </td>

                                <td class="text-2xl text-black">{{ $category->name }}</td>
                                <td><a href="{{ route('categories.edit', $category->id) }}"
                                        class="bg-violet-300 text-white active:bg-violet-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button">Modifier
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button
                                            class="bg-red-600 text-white active:bg-red-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="submit">
                                            <i class="fas fa-heart"></i> Effacer la catégorie
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('categories.create') }}"
                    class="bg-indigo-300 hover:bg-indigo-400 text-white active:bg-violet-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">Créer une catégorie</a>



            </div>
        
    </div>
@endsection
