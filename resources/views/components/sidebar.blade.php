<div x-show="open" x-transition:leave="transition ease-in duration-400" x-transition:leave-start="opacity-100 "
    x-transition:leave-end="opacity-0" class="absolute top-0 left-0 z-10  lg:flex lg:min-h-screen">

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

        <div x-data="{'isHamburgerOpen':false}">

            <nav class="lg:hidden absolute top-12 right-0 left-0 space-y-3 bg-gray-100 shadow-md mt-12 "
                x-transition:enter="transition ease-out duration-150 transform"
                x-transition:enter-start="opacity-0 -translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150 transform"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5"
                x-show="isHamburgerOpen" x-cloak @click.away="isHamburgerOpen = false">
               
                <a href="{{ route('articles.index') }}"
                    class="py-2 block lg:px-4 px-16 lg:text-black text-gray-600 text-sm lg:hover:bg-black hover:text-white hover:bg-green-500 hover:filter  backdrop-blur-md transition duration-200">Articles</a>
                <a href="{{ route('categories.index') }}"
                    class="py-2 block lg:px-4 px-16 lg:text-black text-gray-600 text-sm lg:hover:bg-black hover:text-white hover:bg-green-500 hover:filter  backdrop-blur-md transition duration-200">Catégories</a>
                @guest
               
                <form action="{{ route('login') }}" method="get">
                    @csrf
                    <button class="w-full py-2 block lg:px-4 px-16 lg:text-black text-gray-600 text-sm lg:hover:bg-black hover:text-white hover:bg-green-500 hover:filter  backdrop-blur-md transition duration-200" type="submit">Se Connecter</button>
                </form>
                
                 <a href="{{ route('registers.create') }}"
                        class="py-2 block lg:px-4 px-16 lg:text-black text-gray-600 text-sm lg:hover:bg-black hover:text-white hover:bg-green-500 hover:filter  backdrop-blur-md transition duration-200">S'inscrire</a>
                @endguest

            </nav>

            @auth
               
                <button
                class="flex items-center justify-between w-full px-6 py-2 mt-6 text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none"" @click="
                isHamburgerOpen=true" title="Menu">

                <span class="mx-4 font-medium">Hello {{ auth()->user()->username }} !!</span>

                <span>
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                        <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
            </button>
            @else
                <button
                    class="flex items-center justify-between w-full px-6 py-2 mt-6 text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none"" @click="
                    isHamburgerOpen=true" title="Menu">

                    <span class="mx-4 font-medium">Hello</span>

                    <span>
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>
            @endauth
        </div>


    </div>
    <!--End Mobile -->

    <div
        class="sidebar shadow-md bg-Cambridge_blue bg-opacity-25 text-black w-1/6 space-y-2 py-5 fixed inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition duration-300 ease-out">
        <div href="#" class="flex flex-col items-center lg:space-y-4"><svg xmlns="http://www.w3.org/2000/svg"
                class="pt-4 w-28 h-28" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="miter" stroke-width="1"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            @auth
                <button
                    class="py-2 lg:text-2xl lg:border-b-4 border-gray-50 focus:outline-none transition ease-out duration-200">Hello
                    {{ auth()->user()->username }} !!</button>

                <form action="{{ route('sessions.logout') }}" method="post">
                    @csrf
                    <div>
                        <button type="submit"
                            class="bg-cambridge_blue flex focus:-translate-x-0.5 h-10 items-center justify-around w-40">Se
                            déconnecter

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                </form>
            @else
                <button class="lg:text-xl ">Hello</button>
                <form action="{{ route('login') }}" method="get">
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
