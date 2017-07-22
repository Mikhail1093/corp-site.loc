<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<header>
    Это header
    @yield('head')
    <hr>
</header>
<body>
@section('sidebar')
    Это - главный сайдбар.
@show

<div class="container">
    @yield('content')
</div>

<hr>
<footer>
    футер из шаблона
    @yield('footer')
</footer>
</body>
</html>

</body>
</html>
