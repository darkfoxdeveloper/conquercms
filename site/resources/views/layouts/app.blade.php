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
                                        {{ menu('main', 'menu_template') }}
                                    </div>
                                    <div class="ml-auto">
                                        @php
                                            $secundary_menu_items = menu('secundary', '_json');
                                        @endphp
                                        <ul class="navbar-nav">
                                            @foreach($secundary_menu_items as $menu_item)
                                                @if ($menu_item->url === "#SERVER_STATUS")
                                                    <a class="nav-link" href="#">Server: <span class="text-{{ $config->server_online ? "online" : "offline" }}">{{ $config->server_online ? "ONLINE" : "OFFLINE" }}</span></a>
                                                @elseif ($menu_item->url === "#ONLINE_PLAYERS")
                                                    <a class="nav-link" href="#">Online Players: <span class="online-players">999</span></a>
                                                @elseif ($menu_item->url === "#ACCOUNTS")
                                                    <a class="nav-link" href="#">Accounts: <span class="text-accounts">4900</span></a>
                                                @else
                                                    <li class="nav-item"><a href="{{ $menu_item->url }}" class="nav-link">{{ $menu_item->title }}</a></li>
                                                @endif
                                            @endforeach
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