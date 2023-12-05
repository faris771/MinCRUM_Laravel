<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{     asset('css/styles.css')}}">
    <title>@yield('title')</title>
</head>

<body>
<nav class="navbar">
    <div class="navdiv">

        @yield('navbar-brand')

        @yield('nav-items')
    </div>

</nav>

<div class="data-info">
    @yield('data-info')

</div>
<div class="logo-add">
@yield('logo-add')
</div>

<div class="container">

    <div class="info-text">
        @yield('info-text')


    </div>
    <div class="data">

        @yield('table')

        <div class="pagination">
            @yield('pagination'  )
        </div>


    </div>
</div>

</body>
</html>
