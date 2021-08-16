@extends('template')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

<div class="h-screen flex flex-col justify-center items-center">
    <h2 class="text-center text-3xl m-4">Ajouter votre catégorie</h2>

    <form action="{{ route('categories.store') }}" method="post" class=" m-auto">
        @csrf
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col justify-center items-center  my-2">
            
                <div class="md:w-1/2 px-3 m-6 md:mb-0">

                    <label for="name" class="bg-Cambridge_blue p-1">Ecrivez votre catégorie</label>
                    <input type="text" name="name" id="name" placeholder="Ici ...">
                    <br><br>
                    
                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <label for="parent_id" class="bg-Cambridge_blue p-1">Catégorie parente</label>
                    <select name="parent_id" id="parent_id">

                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                        <option value="">Non classé</option>
                    </select>
                    @error('parent_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="bg-Cambridge_blue hover:bg-Laurel_green hover:text-white text-black font-bold w-40 m-10 py-2 px-4 rounded-full">Ajouter</button>

                </div>
           
        </div>
    </form>

</div>
@endsection
