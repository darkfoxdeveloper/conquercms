<ul class="navbar-nav">
    @foreach($items as $menu_item)
        <li class="nav-item"><a href="{{ $menu_item->url }}" class="nav-link">{{ $menu_item->title }}</a></li>
    @endforeach
</ul>