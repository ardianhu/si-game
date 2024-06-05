<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="{{ url('/') }}">Dell-A</a><button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="bukaNav('example-collapse-navbar')">
                <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden" id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="#pablo"><i class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg "></i><span class="lg:hidden inline-block ml-2">Twitter</span></a>
                </li>
                <li class="flex items-center">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="mx-3 my-4 lg:my-2 cursor-pointer font-semibold overflow-hidden relative z-100 border border-cyan-500 group px-8 py-2">
                            <span class="relative z-10 text-cyan-500 group-hover:text-white text-xl duration-500">Log out</span>
                            <span class="absolute w-full h-full bg-cyan-500 -left-32 top-0 -rotate-45 group-hover:rotate-0 group-hover:left-0 duration-500"></span>
                            <span class="absolute w-full h-full bg-cyan-500 -right-32 top-0 -rotate-45 group-hover:rotate-0 group-hover:right-0 duration-500"></span>
                        </button>
                    </form>
                    @else
                    <button onclick="loginPage()" class="mx-3 my-4 lg:my-2 cursor-pointer font-semibold overflow-hidden relative z-100 border border-cyan-500 group px-8 py-2">
                        <span class="relative z-10 text-cyan-500 group-hover:text-white text-xl duration-500">Login</span>
                        <span class="absolute w-full h-full bg-cyan-500 -left-32 top-0 -rotate-45 group-hover:rotate-0 group-hover:left-0 duration-500"></span>
                        <span class="absolute w-full h-full bg-cyan-500 -right-32 top-0 -rotate-45 group-hover:rotate-0 group-hover:right-0 duration-500"></span>
                    </button>
                    @endauth
                    <script>
                        function loginPage() {
                            window.location.href = "{{ url('/login') }}";
                        }
                    </script>
                </li>
            </ul>
        </div>
    </div>
</nav>