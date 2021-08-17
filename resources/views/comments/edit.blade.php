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

    <div class="flex items-center h-screen w-full bg-teal-lighter">
        <div class="w-full bg-gray-100 rounded shadow-lg p-8 md:max-w-xl md:mx-auto">
            <h1 class="block w-full text-2xl text-center text-Cambridge_blue mb-6">Vous pouvez modifier votre commentaire
            </h1>

            <form class="mb-4 md:flex md:flex-wrap md:justify-between"
                action="{{ route('comments.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col mb-4 w-full">
                    <label class="mb-2 uppercase tracking-wide font-bold text-lg text-grey-darkest">
                        Contenu du commentaire</label>
                    <textarea type="text" name="comment" id="comment" cols="30" rows="5" value="{{old('comment')}}"
                        class="border py-2 px-3 text-grey-darkest md:mr-2">{{ $comment->content }}
                    </textarea>
                </div>

               @can('approval')
                   <div class="block">
                    <span class="text-gray-700">Approuver</span>
                    <div class="mt-2">
                      
                        <label class="inline-flex items-center">
                          <input type="checkbox" class="form-checkbox" name="approuved" value="1">
                          <span class="ml-2">Oui</span>
                        </label>
                     
                    </div>
                  </div>
               @endcan
                
               
                <input type="hidden" name="article_id" value="{{$article[0]->id}}">
                
                <div class="">
                    <button class="block bg-Laurel_green hover:bg-gray-200 text-white uppercase text-lg mx-auto p-2 rounded"
                        type="submit">Envoyer</button>
                </div>


            </form>
        </div>
    </div>
@endsection
