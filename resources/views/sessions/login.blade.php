@extends('template')


<h1>Connectez vous à votre compte</h1>

<main class="px-6 py-8 bg-green-200 outline-none mx-auto max-w-lg">
    <form action="{{route('sessions.storeLogin')}}" method="post">
        @csrf
        <div class="mb-6">
            <label for="username" class="block mb-2 text-gray-600">
                Pseudo
            </label>
            <input type="text" class="border border-gray-500 p-2 w-full" name="username" id="username" value="{{old('username')}}" required>

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        
       <!--
        <div class="mb-6">
            <label for="email" class="block mb-2 text-gray-600">
                e@mail
            </label>
            <input type="text" class="border border-gray-500 p-2 w-full" name="email" id="email" value="{{old('email')}}" required>

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>-->

        <div class="mb-6">
            <label for="password" class="block mb-2 text-gray-600">
                Mot de passe
            </label>
            <input type="password" class="border border-gray-500 p-2 w-full" name="password" id="password" required>

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <button type="submit" class="bg-white hover:bg-green-200 hover:text-white text-black font-bold py-2 px-4 rounded-full">Créer le compte</button>
        </div>
    </form>
</main>