<ul class="navbar-nav">
    @foreach($items as $menu_item)
        @php $submenu = $menu_item->children @endphp
        @if (isset($submenu) && count($submenu) > 0)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSubmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ __('general.switch_lang') }}">
                    {{ $menu_item->getTranslatedAttribute('title',app()->getLocale()) }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownSubmenu">
                    @foreach($submenu as $item)
                        <a class="dropdown-item" href="{{ $item->getTranslatedAttribute('url',app()->getLocale()) }}">{{ $item->getTranslatedAttribute('title',app()->getLocale()) }}</a>
                    @endforeach
                </div>
            </li>
            @else
            <li class="nav-item"><a href="{{ $menu_item->getTranslatedAttribute('url',app()->getLocale()) }}" class="nav-link">{{ $menu_item->getTranslatedAttribute('title',app()->getLocale()) }}</a></li>
        @endif
    @endforeach
</ul>
