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
        <div class="">
            <div class="">
                <div class="form-group">
                    <label for="name">Catégorie</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                        placeholder="Catégorie">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">envoyer</button>

    </form>

@endsection
