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
