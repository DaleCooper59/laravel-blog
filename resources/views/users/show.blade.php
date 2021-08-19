@extends('template')


@section('content')


    <p>{{ $user->username }}</p>

    <p>{{ $role === null ? 'pas de role' : $role->name }}</p>





    <a href="{{ route('users.edit', $user->id) }}">modifier</a>
    </form>


@endsection
