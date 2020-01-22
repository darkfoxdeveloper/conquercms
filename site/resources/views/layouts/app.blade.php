<html>
    <head>
        <title>@yield('title') - ConquerCMS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @section('menu')
        <header class="container-fluid  menu-header">
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
                                                <a class="nav-link" href="#">Server: <span class="text-{{ $config->server_online ? "online" : "offline" }}">{{ $config->server_online ? "ONLINE" : "OFFLINE" }}</span></a>
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
        </header>
        @show

        @section('sidebar')
        @show

        <div class="container py-5 py-md-6">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row justify-content-between align-items-center footer-mh">
                            <div class="col-md-4 mb-4 mb-md-0 pb-1 pb-md-0">
                                <div class="footer-title">{{ $config->about_title }}</div>
                                <p>{{ $config->about_text }}</p>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-title">{{ $config->links_title }}</div>
                                <div class="footer-tags">
                                    @foreach($config->links as $link)
                                        <a href="{{ $link->link }}" class="link" target="_blank">{{ $link->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>