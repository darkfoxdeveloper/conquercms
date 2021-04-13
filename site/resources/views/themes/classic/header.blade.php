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
                            @if (isset($conquer_auth) && $conquer_auth)
                                <ul>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ __('general.switch_lang') }}">
                                            {{ $conquer_auth->Username }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                                            <a class="dropdown-item" href="{{ route('change-password') }}">{{ __('general.change_password') }}</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}">{{ __('general.logout') }}</a>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-login">{{ __('general.login') }}</a>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
