<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    @include('includes.styles')

</head>

<body class="bg-gradient-white">

    @yield('content')
    {{-- @include('includes.footer') --}}
    @include('includes.scripts')
    @stack('add-script')
</body>

</html>