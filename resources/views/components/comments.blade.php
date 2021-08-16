<section class="grid grid-cols-12 w-full my-4 space-y-4">

    @if (!empty($comments) && count($comments) > 0)
        @foreach ($comments as $comment)

            <article
                class="lg:col-span-5 lg:col-start-7 col-span-10 col-start-2 flex h-auto bg-gray-200 rounded space-x-3">
                <div>
                   
                   <img class="w-40  rounded m-1" src="https://i.pravatar.cc/100?u={{ $comment->user_id }}" alt="">
                   <!-- <img class="w-40  rounded m-1"
                   
                   //if /*(auth()->user()->avatar === 'no-avatar')
                        src="https://i.pravatar.cc/100?u="    
                    //else
                        src="/*Storage::url(auth()->user()->avatar)*/ "
                    //endif
                    alt="avatar">-->
                </div>

                <header>
                    <h3 class="font-bold"> {{ $username }} </h3>
                    <p class="text-xs">Posté le {{ $comment->created_at->diffForHumans() }}</p>
                </header>

                <p class="overflow-scroll">{{ $comment->content }}</p>

                <a href="{{ route('comments.edit', $comment->id) }}"
                    class="-backdrop-hue-rotate-15 rounded-bl-xl bg-Laurel_green flex focus:outline-none font-bold h-10 items-center outline-none p-1.5 shadow text-center text-white text-xs uppercase"
                    type="button">
                    <i class="fas fa-heart"></i> Modifier
                </a>

                <a href="{{ route('comments.destroy', $comment->id) }}"
                    class="-backdrop-hue-rotate-15 bg-Taupe_grey flex focus:outline-none font-bold h-10 items-center outline-none p-1.5 shadow text-center text-white text-xs uppercase"
                    type="button">
                    <i class="fas fa-heart"></i> Effacer
                </a>
            </article>
        @endforeach
    @else
        <span>Pas de commentaires</span>
    @endif
</section>
