<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | DELL-A</title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <script type="text/javascript" src="{{ asset('assets/py-js/skulpt.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/py-js/skulpt-stdlib.js') }}"></script>
    <script src="{{ asset('assets/cm/lib/codemirror.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/cm/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cm/theme/ayu-dark.css') }}">
    <script src="{{ asset('assets/cm/mode/python/python.js') }}"></script>
    @vite('resources/css/app.css')
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <!-- <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> -->
</head>

@section('body')

<body class="text-gray-800 antialiased">
    @show
    <div>
        @include('layouts.navbar')
        <div class="">
            @yield('content')
        </div>
    </div>
    <script>
        function bukaNav(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("block");
            // console.log("works");
        }
    </script>
</body>

</html>