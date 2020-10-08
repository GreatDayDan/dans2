<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>@yield('title')</title>
    @yield('css')
    @yield('js')
</head>
<body>
<div id="content">
    <div id="container">
        @include('menu')
        @yield('content')
    </div>
</body>
</html>
