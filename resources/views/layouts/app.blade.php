<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My page</title>
    </head>
    <body>
        @include('inc.navbar')
        @yield('content');
    </body>
</html>
    