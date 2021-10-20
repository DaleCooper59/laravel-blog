@extends('template')


@section('content')

    <div id="userEdit" class="container mx-auto px-4 lg:pt-24 lg:pb-64">
        <h3 class="font-semibold text-black">{{ $user->username }}</h3>


        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')



            <div class="flex flex-wrap mt-12 justify-center">
                <div class="grid grid-cols-1 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6 gap-4">

                    <label class="inline-flex items-center">Admin </label>
                    <input type="checkbox" name="admin" value="1" @if ($role){{ $role->name === 'Admin' ? 'checked' : '' }}@endif>


                    <label class="inline-flex items-center"> Utilisateur </label>
                    <input type="checkbox" name="utilisateur" value="1" @if ($role){{ $role->name === 'Utilisateur' ? 'checked' : '' }}@endif>


                    <button type="submit">modifier</button>


                </div>

        </form>

    </div>
@endsection
