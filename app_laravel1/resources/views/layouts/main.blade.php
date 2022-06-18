<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Dashboard | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
    @include('includes.header')
    @stack('style.css')
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
    @include('includes.sidebar')

    <div class="main-wrapper">
        <!-- ! Main nav -->
        @include('includes.navbar')

        @yield('content')

        @include('includes.footer')
    </div>
    </div>
    @include('includes.script')
</body>

</html>