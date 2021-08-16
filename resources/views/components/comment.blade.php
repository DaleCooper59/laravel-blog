<section class="grid w-full my-4 space-y-4">
    <form action="{{ route('comments.store', $article->id) }}" method="post">
       
        <div class="bg-Old_lavender bg-opacity-20 flex items-center ml-2 rounded space-x-3 w-4/5">
            @csrf

            @if (auth()->user()->avatar === "no-avatar")
            
                <img class="rounded p-1" src="https://i.pravatar.cc/100?u={{auth()->user()->id}}" alt="avatar">
            @else
                <img class="rounded p-1 w-1/12" src="{{ Storage::url(auth()->user()->avatar)}}" alt="avatar">
            @endif
            

            <header class="space-y-2.5">
                <h3 class="font-bold"> {{ auth()->user()->username }} </h3>
                <p class="text-xs">Une pensée ? </p>
            </header>

            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <textarea name="comment" id="comment"
                class="w-full pl-4 m-2 text-Old_lavender text-center focus-within:bg-gray-200 py-2 focus:outline-none"
                cols="20" rows="4" placeholder="commentaire ..." required>{{ old('comment') }}
                
            </textarea>

            <button type="submit" class="relative left-2 text-lg border-2 border-black py-6 px-4 text-white
            hover:from-white hover:to-gray-100 
            hover:text-black hover:border-black">Commenter</button>
        </div>

    </form>

    @error('comment')
        <p class="text-center text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</section>
