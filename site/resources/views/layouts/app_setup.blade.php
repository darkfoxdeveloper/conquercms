<html>
    <head>
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body data-current-lang="{{ App::getLocale() }}">
        @yield('content')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
