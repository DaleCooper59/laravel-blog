<section class="grid grid-cols-12 w-full my-4 space-y-4">

    @if(!empty($comments) && count($comments) > 0)
         
        @foreach ($comments as $comment)

        @if($comment->approuved === 1)
            <article class="lg:col-span-5 lg:col-start-7 col-span-10 col-start-2 flex h-auto bg-gray-200 rounded space-x-3">
                <div>
                    @php
                        $users = $comment->users()->get();
                        $count = 0;
                    @endphp

                    <img class="w-40  rounded m-1" 
                    @if ($users[0]->avatar === 'no-avatar') src="https://i.pravatar.cc/100?u={{ $comment->user_id }}"    
                    @else
                            src="{{ Storage::url($users[0]->avatar) }}" 
                    @endif alt="avatar">
                </div>

                <header>
                    <h3 class="font-bold"> {{ $username }} </h3>
                    <p class="text-xs">Posté le {{ $comment->created_at->diffForHumans() }}</p>
                </header>

                <p class="truncate hover:overflow-auto p-3">{{ $comment->content }}</p>

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
           @else 
            <span></span>
            @endif
        @endforeach
    @else
     <span>Pas de commentaires</span>
    @endif
</section>
