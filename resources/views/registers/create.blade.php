@extends('template')


<main class="px-6 py-8 mt-16 bg-green-200 outline-none mx-auto max-w-lg">

    <h1 class="m-3 text-2xl text-center">Créer un compte</h1>
    <form action="{{ route('registers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="username" class="block mb-2 text-gray-600">
                Pseudo
            </label>
            <input type="text" class="border border-gray-500 p-2 w-full" name="username" id="username"
                value="{{ old('username') }}" required>

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="avatar" class="block mb-2 text-gray-600">
                Avatar
            </label>
            <input type="file" class="border border-gray-500 p-2 w-full" name="avatar" id="avatar"
                value="{{ old('avatar') }}" required>

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="name" class="block mb-2 text-gray-600">
                Nom et prénom
            </label>
            <input type="text" class="border border-gray-500 p-2 w-full" name="name" id="name"
                value="{{ old('name') }}" required>

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 text-gray-600">
                e@mail
            </label>
            <input type="text" class="border border-gray-500 p-2 w-full" name="email" id="email"
                value="{{ old('email') }}" required>

            @error('email')
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

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 text-gray-600">
                Répéter le mot de passe
            </label>
            <input type="password" class="border border-gray-500 p-2 w-full" name="password_confirmation"
                id="password_confirmation" required>

            @error('passwordConfirmed')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 flex justify-around">
            <button type="submit"
                class="bg-white hover:bg-green-200 hover:text-white text-black font-bold py-2 px-4 rounded-full">Créer
                le compte</button>
            <a href="{{route('articles.index')}}"
                class="bg-white hover:bg-green-200 hover:text-white text-black font-bold py-2 px-4 rounded-full">Retourner aux articles</a>
        </div>
    </form>
</main>
