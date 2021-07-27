
@extends('template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    @section('h1')
        Ajouter un article
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

      <form method="post" action="{{route('articles.store')}}">
.         @csrf
          <div class="form-group">
              <label for="title"></label>
              <input type="text" class="form-control" name="title"/>
          </div>

          <div class="form-group">
              <label for="content"> </label>
              <input type="text" class="form-control" name="content"/>
          </div>
          <div class="form-group">
              <label for="picture"> </label>
              <input type="text" class="form-control" name="picture"/>
          </div>
          <div class="form-group">
              <label for="slug"> </label>
              <input type="text" class="form-control" name="slug"/>
          </div>
         <!-- <div class="form-group">
              <label for="category"> </label>
              <input type="text" class="form-control" name="category"/>
          </div>-->
          <button type="submit" class="btn btn-primary">Publier</button>
      </form>
  </div>
</div>
@endsection
