<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Envitation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('storage/assets/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('storage/assets/DataTables/datatables.css') }}"></link>
    <script src="{{ asset('storage/assets/DataTables/datatables.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('storage/assets/DataTables/Responsive-2.5.0/css/responsive.dataTables.min.css') }}"></link>
    <script src="{{ asset('storage/assets/DataTables/Responsive-2.5.0/js/responsive.dataTables.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script> -->

    <!-- <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <!-- <style>
        * {
            border: red 1px solid;
        }
    </style> -->
</head>

@section('body')

<body class="text-gray-800 bg-gray-100 antialiased">
    @show
    <div>
        @include('layouts.admin_sidebar')
        <div class="">
            @yield('contentadmindash')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>