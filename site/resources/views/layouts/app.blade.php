<html>
    <head>
        <title>@yield('title') - ConquerCMS</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @section('menu')
        <div class="container-fluid  menu-header">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <nav class="navbar navbar-expand-lg navbar-dark">
                                    <a class="navbar-brand" href="#">ConquerCMS</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCCMS" aria-controls="navbarCCMS" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarCCMS">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Register</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Downloads</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Store</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ml-auto">
                                    <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#">Server: <span class="text-online">ONLINE</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Online Players: <span class="online-players">999</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Accounts: <span class="text-accounts">4900</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Login</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-orange" href="#">Forgot Pass?</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @show

        @section('sidebar')
        @show

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>