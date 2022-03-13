<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.header')
    @yield('css')
</head>
<body>

    @include('template.navbar')

    @yield('content')

    @include('template.footer')
    
</body>
</html>