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



    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="name">Catégorie</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Catégorie">
            <label for="parent_id">Catégorie</label>
            <select name="parent_id" id="parent_id">
                
                    <option value="{{ $category->parent_id }}">{{ $category->name }}</option>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">envoyer</button>

    </form>

@endsection
