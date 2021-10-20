@extends('template')


@section('content')
      
        <div id="user" class="container mx-auto px-4 lg:pt-24 lg:pb-64">

            <div class="flex flex-wrap mt-12 justify-center">
                <div class="grid grid-cols-1 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6 gap-4">

                    <div class="col-span-2 sm:col-span-4 xl:col-span-4">
                        <h3 class="font-semibold text-black">{{ $user->username }}</h3>

                    </div>
                    <div class="col-span-2 sm:col-span-4 xl:col-span-4">

                        <p>{{ $role === null ? 'pas de role' : $role->name }}</p>
                    </div>

                   <a href="{{ route('users.edit', $user->id) }}">modifier</a>

                </div>
            </div>
        </div>
    
@endsection
