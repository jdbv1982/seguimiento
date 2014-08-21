<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Seguimiento</title>
    @include('layouts/css')
    @yield('css')
</head>

<body>

    @include('layouts/menu')

    <div class="col-xs-12">
        @yield('content')
    </div>

    @include('layouts/js')

    @yield('js')
</body>
</html>
