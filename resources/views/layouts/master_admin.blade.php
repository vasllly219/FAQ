<html lang="{{ config('app.locale') }}" class="no-js">
    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    	<link rel="stylesheet" href="{{ asset('css/reset.css')}}"> <!-- CSS reset -->
    	<link rel="stylesheet" href="{{ asset('css/style.css')}}"> <!-- Resource style -->
        <script src="{{ asset('js/modernizr.js')}}"></script> <!-- Modernizr -->
    	<title>@yield('title')</title>
    </head>
    <body>
        <!--панель как на фоксе-->
<nav class="five">
    <ul class="topmenu">
        <li><a href="/">FAQ</a></li>
        <li><a href="/admin/admins">Админы</a></li>
        <li><a href="/admin/categories">Категории</a></li>
        <li><a href="/admin/category">Вопросы</a></li>
        <li><a href="/logout">Выйти</a></li>
    </ul>
</nav>
        <!--панель как на фоксе-->
        @yield('content')
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/jquery.mobile.custom.min.js"></script>
        <script src="js/main.js"></script> <!-- Resource jQuery -->
    </body>
</html>
