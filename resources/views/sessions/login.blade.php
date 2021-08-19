@extends('template')

<main class="px-6 py-8 bg-green-200 outline-none mt-16 mx-auto max-w-lg">
    <h1 class="m-3 text-2xl text-center">Connectez vous à votre compte</h1>
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

        <div class="mb-6">
            <label for="password" class="block mb-2 text-gray-600">
                Mot de passe
            </label>
            <input type="password" class="border border-gray-500 p-2 w-full" name="password" id="password" required>

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6 flex justify-around">
            <button type="submit" class="bg-white hover:bg-green-200 hover:text-white text-black font-bold py-2 px-4 rounded-full">Se connecter</button>
            <a href="{{route('registers.create')}}" class="bg-white hover:bg-green-200 hover:text-white text-black font-bold py-2 px-4 rounded-full">Créer un compte</a>
        </div>
    </form>
</main>