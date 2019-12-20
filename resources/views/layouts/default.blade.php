<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <title>@yield('title', 'Weibo App') - Laravel 入门</title>
    </head>
    <body>
        @include('layouts._header')

        <div class="container">
            <div class="offset-md-1 col-md-10">
                @yield('content')
                @include('layouts._footer')
            </div>
        </div>
    </body>
</html>