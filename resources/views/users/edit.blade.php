@extends('template')


@section('content')


    <p>{{$user->username}}</p>
    
    <form action="{{route('users.update',$user->id)}}" method="post">
        @csrf
        @method('PATCH')
        <label class="inline-flex items-center">Admin </label>
        <input type="checkbox" name="admin" value="1" @if($role){{$role->name === 'Admin' ? 'checked' : '' }}@endif>
            
          
        <label class="inline-flex items-center"> Utilisateur </label>
            <input type="checkbox" name="utilisateur" value="1" @if($role){{$role->name === 'Utilisateur' ? 'checked' : '' }}@endif>
           
         
    <button type="submit">modifier</button>
 </form>
 
   

    @endsection