@extends('template')

@section('content')
    <div class="flex content-center h-screen">
        <div class="m-auto  text-center">
        @section('h1')
            <h1 class="text-3xl">
                Les catégories d'article
            </h1>
        @endsection
        <table class="table-auto h-full w-full">


            <thead>
                <tr class="bg-green-200">
                    <th scope="col" class=" text-2xl">Catégories</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)

                    <tr>
                        <th id="aa" scope="row">N°</th>
                        <td class=" text-2xl"> <a href="{{route('categories.show', $category->id)}}">{{ $category->id }}</a>  - </td>

                        <td class="text-2xl">{{ $category->name }}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}"  
                            class="bg-violet-300 text-white active:bg-violet-300 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">Modifier
                        </a>
                        </td>
                        <td><a href="{{ route('categories.destroy', $category->id) }}"
                            class="bg-red-600 text-white active:bg-red-900 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">
                            <i class="fas fa-heart"></i> Effacer la catégorie
                        </a></td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <a href="{{ route('categories.create') }}">Créer une catégorie</a>
        

    </div>
</div>
@endsection
