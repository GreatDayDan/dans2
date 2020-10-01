<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    <p>This is before yielding the content.</p>
    @section('events')
    @yield('events')
    <p>This is after yielding the content.</p>
</div>
</body>
</html>
