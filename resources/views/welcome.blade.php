<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="frontend example">
        <meta name="author" content="Daniel Alejandro Peña García">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>frontend example</title>
        {{-- fonts-icons --}}
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/jquery-table.min.css" rel="stylesheet">
        <link href="css/structure.css{{ '?' . time() }}" rel="stylesheet">
        <link href="css/animations.css{{ '?' . time() }}" rel="stylesheet">
        <link href="css/media-query.css{{ '?' . time() }}" rel="stylesheet">
        @section('header')
        @show
    </head>
    <body>
        @section('container')
            <div class="body-container">
                <div class="container-main">
                    @include('menu')
                </div>
            </div>
        @show
    </body>
    <footer>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-table.min.js{{'?' . time() }}"></script>
        <script src="js/main.js{{'?' . time() }}"></script>
        @section('footer')
        @show
    </footer>
</html>
