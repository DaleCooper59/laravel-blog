@extends('template')


@section('content')

    <div id="menu" class="container mx-auto px-4 lg:pt-24 lg:pb-64">
        <div class="flex flex-wrap text-center justify-center">
            <div class="w-full lg:w-6/12 px-4">
                <h2 class="text-4xl font-semibold text-black">Les utilisateurs</h2>
                <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
                    Ici vous pouvez dans le cas où vous êtes administrateur, le role de chaque utilisateur
                </p>
            </div>
        </div>
        <div class="flex flex-wrap mt-12 justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6 gap-4">
                @foreach ($users as $user)
                    <div class="col-span-2 sm:col-span-1 xl:col-span-1">
                        @if ($user->avatar === 'no-avatar')
                            <small>pas de photo</small>
                        @else
                            <img alt="..." src="{{ $user->avatar }}" class="h-24 w-24 rounded  mx-auto" />
                        @endif

                    </div>
                    <div class="col-span-2 sm:col-span-4 xl:col-span-4 flex">
                        <h3 class="font-semibold text-black mx-2">{{ $user->username }}</h3>
                        @foreach ( $user->roles as $role)
                             <span>{{ $role->name }}</span>
                        @endforeach
                       
                    </div>
                    <a href="{{ route('users.show', $user->id) }}" method="get"> modfier </a>
                @endforeach
            </div>
        </div>
    </div>



@endsection
