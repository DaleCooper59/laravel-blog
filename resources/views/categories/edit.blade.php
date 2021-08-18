@extends('template')

@section('content')



    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col items-center my-2">
            <div class="-mx-3 md:flex mb-6">
                <div class=" px-3 mb-6 md:mb-0">
                    <label for="name" class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2">Catégorie</label>
                    <input type="text" name="name" value="" class="appearance-none block w-full bg-gray-lighter text-gray-400 border border-red rounded py-3 px-4 mb-3"
                     placeholder="{{ $category->name }}">
                    <br><br>
                    @error('name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                    <label for="parent_id" class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2">Catégorie parente</label>
                    <select name="parent_id" id="parent_id">

                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach

                    </select>
                    @error('parent_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                </div>
            </div>
            <button type="submit" class="bg-Cambridge_blue hover:bg-Laurel_green hover:text-white text-black font-bold w-40 m-10 py-2 px-4 rounded-full">envoyer</button>

        </div>

        
    </form>

@endsection
