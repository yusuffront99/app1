<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Elegant Dashboard | Sign In</title>
<!-- Favicon -->
<link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
<!-- Custom styles -->
@include('includes.header')
@stack('style.css')
</head>

<body>
<div class="layer"></div>
    @yield('content')

    @include('includes.script')

    @stack('script-js')
</body>

</html>