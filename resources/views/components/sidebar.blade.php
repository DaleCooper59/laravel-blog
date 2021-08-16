<div x-show="open" x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="transform translate-x-40 scale-50 "
    x-transition:enter-end="transform translate-x-0 scale-100" x-transition:leave="transition ease-in duration-400"
    x-transition:leave-start="opacity-100 " x-transition:leave-end="opacity-0"
    class="absolute top-0 left-0 z-10  lg:flex lg:min-h-screen">

    <!--Mobile-->
    <div
        class=" flex justify-between bg-Cambridge_blue bg-opacity-25 text-black transition duration-300 w-screen lg:hidden">

        <div>
            <a href="#" class="p-6 flex justify-around text-white  font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="miter" stroke-width="1"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </a>
        </div>


        <nav class="hidden">
            <a href="{{ route('articles.index') }}"
                class="py-2 block px-4 hover:bg-black hover:filter  backdrop-blur-md transition duration-200">Articles</a>
            <a href="{{ route('categories.index') }}"
                class="py-2 block px-4 hover:bg-black hover:filter backdrop-blur-md transition duration-200">Catégories</a>
            @guest
                <a href="{{ route('registers.create') }}"
                    class="py-2 block px-4 hover:bg-black hover:filter backdrop-blur-md transition duration-200">S'inscrire</a>
            @endguest

        </nav>

        @auth
            <button class="text-xl  mr-10">Hello {{ auth()->user()->username }} !!</button>
        @else
            <button class="text-xl  mr-10">Hello</button>
        @endauth

    </div>
    <!--End Mobile -->

    <div
        class="sidebar shadow-md bg-Cambridge_blue bg-opacity-25 text-black w-1/6 space-y-2 py-5 fixed inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition duration-300 ease-out">
        <div href="#" class="flex flex-col items-center lg:space-y-4"><svg xmlns="http://www.w3.org/2000/svg" class="pt-4 w-28 h-28"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="miter" stroke-width="1"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            @auth
                <button class="py-2 lg:text-2xl lg:border-b-4 border-gray-50 focus:outline-none transition ease-out duration-200">Hello {{ auth()->user()->username }} !!</button>

                <form action="{{ route('sessions.logout') }}" method="post">
                    @csrf
                    <div>
                         <button type="submit" class="bg-cambridge_blue flex focus:-translate-x-0.5 h-10 items-center justify-around w-40">Se déconnecter
                       
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                    </button>
                    </div>
                   
                </form>
            @else
                <button class="lg:text-xl ">Hello</button>
                <form action="{{ route('sessions.login') }}" method="get">
                    @csrf
                    <button type="submit">Se Connecter</button>
                </form>
            @endauth


            </div>
        <nav>
            <a href="{{ route('articles.index') }}"
                class="py-2 block px-4 hover:bg-black hover:filter hover:text-white  transition duration-200">Articles</a>
            <a href="{{ route('categories.index') }}"
                class="py-2 block px-4 hover:bg-black hover:filter hover:text-white transition duration-200">Catégories</a>
            @guest
                <a href="{{ route('registers.create') }}"
                    class="py-2 block px-4 hover:bg-black hover:filter hover:text-white  transition duration-200">S'inscrire</a>
            @endguest

        </nav>
    </div>
</div>
