@extends('../template')

@section('../content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <form action="{{ route('posts.update',$article->id) }}" method="POST">
        @csrf
      <?= /* @method('PUT')*/?>
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>contenu</strong>
                    <textarea class="form-control" style="height:150px" name="content" placeholder="contenu">{{ $article->content }}</textarea>
                </div>
            </div>
            <!--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Catégorie</strong>
                    <input type="text" name="category" value="{{ $category->name }}" class="form-control" placeholder="Catégorie">
                </div>
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>image</strong>
                    <textarea class="form-control" style="height:150px" name="picture" placeholder="image">{{ $article->picture }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>slug</strong>
                    <textarea class="form-control" style="height:150px" name="slug" placeholder="slug">{{ $article->slug }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">envoyer</button>
            </div>
        </div>
   
    </form>
@endsection