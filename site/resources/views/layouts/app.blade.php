<html>
    <head>
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="section-{{ $section }}">
        @section('menu')
        <header class="container-fluid  menu-header">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <nav class="navbar navbar-expand-lg navbar-dark">
                                    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCCMS" aria-controls="navbarCCMS" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarCCMS">
                                        {{ menu('main', 'menu_template') }}
                                    </div>
                                    <div class="ml-lg-auto">
                                        @php
                                            $secundary_menu_items = menu('secundary', '_json');
                                        @endphp
                                        <ul class="navbar-nav">
                                            @if ($secundary_menu_items)
                                                @foreach($secundary_menu_items as $menu_item)
                                                    @if ($menu_item->url === "#SERVER_STATUS")
                                                        <a class="nav-link" href="#">{{ __('general.status') }} <span class="text-{{ $server_status ? "online" : "offline" }}">{{ $server_status ? __('general.online') : __('general.offline') }}</span></a>
                                                    @elseif ($menu_item->url === "#ONLINE_PLAYERS")
                                                        <a class="nav-link" href="#">{{ __('general.online_players') }} <span class="online-players">{{ $online_players }}</span></a>
                                                    @elseif ($menu_item->url === "#ACCOUNTS")
                                                        <a class="nav-link" href="#">{{ __('general.accounts') }} <span class="text-accounts">{{ $total_accounts }}</span></a>
                                                    @else
                                                        <li class="nav-item"><a href="{{ $menu_item->url }}" class="nav-link">{{ $menu_item->title }}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ __('general.switch_lang') }}">
                                                    {{ \Illuminate\Support\Facades\App::getLocale() }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    @foreach(config('app.locales') as $lang)
                                                            <a class="dropdown-item" href="/lang/{{ $lang }}">{{ $lang }}</a>
                                                    @endforeach
                                                </div>
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

        <div class="container py-5 py-md-6" id="content-container">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('info'))
                        <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Please check the form below for errors
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>

        @section('footer')
        <footer class="container-fluid" id="footer">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row justify-content-between align-items-center footer-mh">
                            <div class="col-md-4 mb-4 mb-md-0 pb-1 pb-md-0">
                                <div class="footer-title">{{ __('general.about_title') }}</div>
                                <p>{{ __('general.about_text') }}</p>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-title">{{ __('general.links_title') }}</div>
                                <div class="footer-tags">
                                    <a href="https://www.darkfoxdeveloper.com" class="link" target="_blank">OpenConquer Forum</a>
                                </div>
                                <div class="d-inline-block">
                                    <!-- Begin XtremeTop100 code -->
                                    <a href="#vote" title="Vote ShadowConquer" target="_blank" id="vote-link">
                                        <img src="http://www.xtremeTop100.com/votenew.jpg" border="0" alt="private server"></a>
                                    <!-- End XtremeTop100 code -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        @show

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $("#vote-link").on("click", function(e){
                e.preventDefault();
                var username = prompt("Please enter your username for vote [Get 40 ShadowPoints for your vote ;)]", "");
                window.location = "http://www.xtremetop100.com/in.php?site=1132371326&postback=" + username;
            });
        </script>
    </body>
</html>
