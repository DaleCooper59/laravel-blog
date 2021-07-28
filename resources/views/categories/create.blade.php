@extends('template')

@section('content')

    <h2>Vous voulez ajouter une catégorie?</h2>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name"></label>
        <input type="text" name="name" id="name" placeholder="Mettez ici votre catégorie">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    

@endsection
