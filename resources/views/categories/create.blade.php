@extends('template')

@section('content')

    <h2>Vous voulez ajouter une catégorie?</h2>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name"></label>
        <input type="text" name="name" id="name" placeholder="Mettez ici votre catégorie">
        <br><br>
        <label for="parent_id">Catégorie</label>
           <select name="parent_id" id="parent_id" >
                
                @foreach ($categories as $cat)
                    <option  value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
                <option value="">Non classé</option>
            </select>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    

@endsection
