@extends('template')


@section('content')

@foreach ($users as $user)
    <p>{{$user->username}}</p>
    <a href="{{route('users.show', $user->id)}}" method="get"> modfier </a>
   
@endforeach

    @endsection
