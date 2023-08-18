<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('style')
</head>

<body>

    <!-- Navbar -->
    @include('includes.navbar-alternate')
    <!-- Navbar -->

    @yield('content')

    @stack('prepend-script')
    @include('includes.script')
    @stack('script')
</body>

</html>