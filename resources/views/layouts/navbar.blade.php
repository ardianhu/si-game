<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="{{ url('/') }}">DELL•A</a><button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="bukaNav('example-collapse-navbar')">
                <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden" id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                <!-- <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="#pablo"><i class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg "></i><span class="lg:hidden inline-block ml-2">Twitter</span></a>
                </li> -->
                <li class="flex items-center space-x-4">
                    <div class="stopwatch inline-block px-4 py-2 bg-gray-800 rounded-lg shadow-lg">
                        <div class="text-center text-white" id="time">
                            <div class="flex justify-center items-baseline space-x-4">
                                <div class="flex flex-col items-center">
                                    <span class="text-3xl font-bold" id="hr">00</span>
                                    <!-- <span class="text-md">Hr</span> -->
                                </div>
                                <div class="flex flex-col items-center">
                                    <span class="text-3xl font-bold" id="min">00</span>
                                    <!-- <span class="text-md">Min</span> -->
                                </div>
                                <div class="flex flex-col items-center">
                                    <span class="text-3xl font-bold" id="sec">00</span>
                                    <!-- <span class="text-md">Sec</span> -->
                                </div>
                                <div class="flex flex-col items-center">
                                    <span class="text-3xl font-bold" id="count">00</span>
                                    <!-- <span class="text-md">Count</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative inline-block text-left">
                        <div class="group">
                            <button type="button" class="inline-flex text-3xl  rounded-lg justify-center items-center w-full px-4 py-2 font-medium text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                ≡
                            </button>
                            <div class="absolute left-0 w-40 origin-top-left bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-30">
                                <div class="py-1">
                                    <button onclick="mainMenu()" href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  w-full text-start">Main Menu</button>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-start">Quit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <button onclick="loginPage()" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button> -->
                    <script>
                        function mainMenu() {
                            window.location.href = "{{ url('/') }}";
                        }
                    </script>
                </li>
            </ul>
        </div>
    </div>
</nav>