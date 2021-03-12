<ul class="navbar-nav">
    @foreach($items as $menu_item)
        <li class="nav-item"><a href="{{ $menu_item->getTranslatedAttribute('url',app()->getLocale()) }}" class="nav-link">{{ $menu_item->getTranslatedAttribute('title',app()->getLocale()) }}</a></li>
    @endforeach
</ul>
