@extends('layouts.master')
@section('title')
@endsection
@section('content')

<main>
    <section class="absolute w-full h-full bg-black">
        <div class="absolute w-full top-8 flex justify-center items-center">
            <img class="w-3/4 md:w-1/4" src="assets/game/logo.png" alt="">
        </div>
        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-5/12 px-4">
                    <div class="relative terminal p-5 rounded-lg w-full font-mono">
                        <!-- <div class="flex justify-center items-start">
                            <img class="w-1/2" src="assets/game/logo.png" alt="">
                        </div> -->
                        <div class="terminal-header bg-zinc-700 text-white p-2 rounded-t-lg flex items-center">
                            <span class="text-red-500 text-5xl leading-[0px] align-middle -mt-2">•</span>
                            <span class="text-yellow-500 text-5xl leading-[0px] align-middle -mt-2 ml-1">&bull;</span>
                            <span class="text-green-500 text-5xl leading-[0px] align-middle -mt-2 ml-1">&bull;</span>
                            <span class="ml-4 align-baseline">authentication --- bash - zsh </span>
                        </div>
                        <div id="output" class="pl-4 pt-2 bg-gray-900 max-h-[500px] overflow-auto">
                            <p class="text-gray-500">You need to authenticate to continue!</p>
                            <p class="text-sky-300">Enter 1 to login</p>
                            <p class="text-sky-300">Enter 2 to register</p>
                        </div>
                        <div id="terminal-input-container" class="input flex pl-4 bg-gray-900 pb-4 rounded-b-lg items-center">
                            <span class="text-green-500">➝</span>
                            <span class="text-sky-300 ml-2">~</span>
                            <span id="placeholder" class="ml-2 text-md text-gray-500"></span>
                            <input type="text" id="terminal-input" class="bg-transparent border-none outline-none ring-0 focus:ring-0 text-amber-400 w-full">
                        </div>
                    </div>
                    <!-- <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
                        <div class="rounded-t mb-0 px-6 py-6">
                            <div class="text-center mb-3">
                                <h6 class="text-gray-600 text-sm font-bold">
                                    Sign In
                                </h6>
                            </div>
                            <hr class="mt-6 border-b-1 border-gray-400" />
                        </div>
                        <div class="flex-auto px-4 lg:px-10 pb-4 pt-0">
                            <form method="POST" action="#" id="login_form" enctype="multipart/form-data">
                                @csrf
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Email</label><input type="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Email" id="email" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Password</label><input type="password" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Password" id="password" style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div>
                                    <label class="inline-flex items-center cursor-pointer"><input id="customCheckLogin" type="checkbox" class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5" style="transition: all 0.15s ease 0s;" /><span class="ml-2 text-sm font-semibold text-gray-700">Remember me</span></label>
                                </div>
                                <div class="text-center mt-6">
                                    <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" type="submit" style="transition: all 0.15s ease 0s;">
                                        Sign In
                                    </button>
                                </div>
                            </form>
                            <div class="flex flex-wrap mt-2">
                                <div class="w-1/2">
                                    <a href="#cpablo" class="text-gray-800"><small>Forgot password?</small></a>
                                </div>
                                <div class="w-full text-center">
                                    <a href="{{ url('register') }}" class="text-gray-800"><small>Create new account</small></a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <footer class="absolute w-full bottom-0 bg-black pb-6">
            <div class="container mx-auto px-4">
                <hr class="mb-6 border-b-1 border-gray-700" />
                <div class="flex items-center  justify-center">
                    <div class="w-full px-4">
                        <div class="text-center text-sm text-white font-semibold py-1">
                            Copyright © 2024
                            <a href="https://github.com/ardianhu/si-game" class="text-white hover:text-gray-400 text-sm font-semibold py-1">Dell-A Game</a>
                        </div>
                    </div>
                    <!-- <div class="w-full md:w-8/12 px-4">
                        <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                            <li>
                                <a href="https://www.creative-tim.com" class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">Creative Tim</a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/presentation" class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">About Us</a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com" class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">Blog</a>
                            </li>
                            <li>
                                <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="text-white hover:text-gray-400 text-sm font-semibold block py-1 px-3">MIT License</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </footer>
    </section>
</main>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const output = document.getElementById('output');
        const terminalInput = document.getElementById('terminal-input');
        const placeholderSpan = document.getElementById('placeholder');
        const terminalInputContainer = document.getElementById('terminal-input-container')
        let mode = '';
        let step = 0;
        let credentials = {};
        let isPassword = false
        let isFinalStep = false

        terminalInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                const input = terminalInput.value.trim();
                if (isPassword) {
                    output.innerHTML += `<div class="flex"><span class="text-green-500">➝</span><span class="bg-transparent border-none outline-none w-full text-amber-400 ml-2">${'•'.repeat(input.length)}</span></div>`;
                } else {
                    output.innerHTML += `<div class="flex"><span class="text-green-500">➝</span><span class="bg-transparent border-none outline-none w-full text-amber-400 ml-2">${input}</span></div>`;
                }
                if (isFinalStep) {
                    terminalInputContainer.classList.add('hidden');
                    output.classList.add('rounded-b-lg', 'pb-4')
                }
                terminalInput.value = '';
                terminalInput.setAttribute('type', 'text')

                if (!mode) {
                    if (input === '1') {
                        mode = 'login';
                        output.innerHTML += `<p class="text-sky-300">Login selected. Enter email</p>`;
                        placeholderSpan.innerText = "email:";
                    } else if (input === '2') {
                        mode = 'register';
                        output.innerHTML += `<p class="text-sky-300">Register selected. Enter username</p>`;
                        placeholderSpan.innerText = "username:";
                    } else {
                        output.innerHTML += `<p class="text-red-400">Invalid input. Please press 1 to login or 2 to register.</p>`;
                    }
                } else if (mode === 'login') {
                    handleLogin(input);
                } else if (mode === 'register') {
                    handleRegister(input);
                }

                output.scrollTop = output.scrollHeight;
            } else if (event.ctrlKey && event.key === 'c') {
                resetTerminal()
            }
        });

        function handleLogin(input) {
            if (step === 0) {
                credentials.email = input;
                output.innerHTML += `<p class="text-sky-300">email saved. Enter password</p>`;
                placeholderSpan.innerText = "password:";
                terminalInput.setAttribute('type', 'password')
                isPassword = true
                isFinalStep = true
                step++;
            } else if (step === 1) {
                credentials.password = input;
                output.innerHTML += `<p class="text-sky-300">Password saved</p>`;
                displayFinalStep();
            }
        }

        function handleRegister(input) {
            if (step === 0) {
                credentials.username = input;
                output.innerHTML += `<p class="text-sky-300">Username saved. Enter email</p>`;
                placeholderSpan.innerText = "email:";
                step++;
            } else if (step === 1) {
                credentials.email = input;
                output.innerHTML += `<p class="text-sky-300">Email saved. Enter password</p>`;
                placeholderSpan.innerText = "password:";
                terminalInput.setAttribute('type', 'password')
                isPassword = true
                isFinalStep = true
                step++;
            } else if (step === 2) {
                credentials.password = input;
                output.innerHTML += `<p class="text-sky-300">Password saved</p>`;
                displayFinalStep();
            }
        }

        function displayFinalStep() {
            const formattedCredentials = formatCredentials(credentials, mode);
            output.innerHTML += `<p class="text-gray-500">Credentials entered:</p><pre class="text-gray-500">${formattedCredentials}</pre>`;
            output.innerHTML += `
                    <button class="bg-white text-black px-4 py-2 mt-2 rounded ml-2" onclick="handleDiscard()">Reset</button>
                    <button id="continue-auth" class="bg-indigo-500 text-white px-4 py-2 mt-2 rounded" onclick="handleContinue()">Continue</button>
                `;
            placeholderSpan.innerText = ""; // Reset placeholder
        }

        function formatCredentials(credentials, mode) {
            let formatted = `email: <span class="text-amber-400">${credentials.email}</span>\n`;
            if (mode === 'register') {
                formatted += `username: <span class="text-amber-400">${credentials.username}</span>\n`;
            }
            formatted += `password: <span class="text-amber-400">${'•'.repeat(credentials.password.length)}</span>`;
            return formatted;
        }

        window.handleContinue = function() {
            console.log(mode)
            if (mode === 'login') {
                console.log(credentials.email, credentials.password)
                // Send an Ajax request to the server
                $.ajax({
                    url: '/login', // Specify the URL to your login controller method
                    type: 'POST',
                    data: {
                        email: credentials.email,
                        password: credentials.password,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle the response from the server, e.g., redirect or display a message
                        if (response.success) {
                            console.log('berhasil')
                            window.location.href = "{{ url('/') }}";
                        }
                    },
                    error: function(xhr) {
                        // Handle any errors, e.g., display an error message
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessage += errors[key][0] + '\n';
                            }
                        }
                        output.innerHTML += `<p class="text-red-500">Invalid email or password</p>`;
                        const continueButton = document.getElementById('continue-auth');
                        continueButton.disabled = true;
                        continueButton.classList.add('cursor-not-allowed')
                        // Swal.fire({
                        //     title: 'Error!',
                        //     text: 'Invalid email or password!',
                        //     icon: 'error',
                        //     confirmButtonText: 'OK'
                        // });
                    }
                });
            } else if (mode === 'register') {
                console.log(credentials.username, credentials.email, credentials.password)
                // Send an Ajax request to the server
                $.ajax({
                    url: '/register', // Specify the URL to your login controller method
                    type: 'POST',
                    data: {
                        name: credentials.username,
                        email: credentials.email,
                        password: credentials.password,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle the response from the server, e.g., redirect or display a message
                        if (response.success) {
                            console.log('berhasil')
                            // window.location.href = "{{ url('/game') }}";
                            output.innerHTML += `<p class="text-sky-300">${response.message}</p>`;
                            const continueButton = document.getElementById('continue-auth');
                            continueButton.disabled = true;
                            continueButton.classList.add('cursor-not-allowed')
                        }
                    },
                    error: function(xhr) {
                        // Handle any errors, e.g., display an error message
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    errorMessage += errors[key][0] + '\n';
                                }
                            }
                            output.innerHTML += `<p class="text-red-500">${errorMessage}</p>`;
                            const continueButton = document.getElementById('continue-auth');
                            continueButton.disabled = true;
                            continueButton.classList.add('cursor-not-allowed')
                            // Swal.fire({
                            //     title: 'Error!',
                            //     text: errorMessage,
                            //     icon: 'error',
                            //     confirmButtonText: 'OK'
                            // });
                        }
                    }
                });
            }
            // output.innerHTML += `<p>Credentials have been submitted.</p>`;
            // resetTerminal();
        }

        window.handleDiscard = function() {
            output.innerHTML += `<p>Credentials have been discarded.</p>`;
            resetTerminal();
        }

        function resetTerminal() {
            mode = '';
            step = 0;
            credentials = {};
            output.innerHTML = `<p class="text-gray-500">You need to authenticate to continue!</p>
            <p class="text-sky-300">Enter 1 to login</p>
            <p class="text-sky-300">Enter 2 to register</p>`;
            placeholderSpan.innerText = ""; // Reset placeholder
            isFinalStep = false
            isPassword = false
            terminalInputContainer.classList.remove('hidden');
            output.classList.remove('rounded-b-lg', 'pb-4')
        }
    });
    // $(document).ready(function() {
    //     // Listen for form submission
    //     $("#login_form").on("submit", function(e) {
    //         e.preventDefault(); // Prevent the default form submission

    //         var email = $("#email").val();
    //         var password = $("#password").val();

    //         // Validate the inputs
    //         if (!email || !password) {
    //             Swal.fire({
    //                 title: 'Error!',
    //                 text: 'Email and password are required!',
    //                 icon: 'error',
    //                 confirmButtonText: 'OK'
    //             });
    //             return;
    //         }

    //         // Send an Ajax request to the server
    //         $.ajax({
    //             url: '/login', // Specify the URL to your login controller method
    //             type: 'POST',
    //             data: {
    //                 email: email,
    //                 password: password,
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function(response) {
    //                 // Handle the response from the server, e.g., redirect or display a message
    //                 if (response.success) {
    //                     console.log('berhasil')
    //                     window.location.href = "{{ url('/') }}";
    //                 }
    //             },
    //             error: function(xhr) {
    //                 // Handle any errors, e.g., display an error message
    //                 Swal.fire({
    //                     title: 'Error!',
    //                     text: 'Invalid email or password!',
    //                     icon: 'error',
    //                     confirmButtonText: 'OK'
    //                 });
    //             }
    //         });
    //     });
    // });
</script>
@endsection
@section('script')
@endsection