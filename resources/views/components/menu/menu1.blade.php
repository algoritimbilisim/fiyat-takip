<ul class="navbar-nav ml-auto">
    @foreach ($items as $menu_item)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ $menu_item->link() }}" id="dropdown03" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">{{ $menu_item->title }}<i class="icofont-thin-down"></i></a>
            @forelse ($menu_item->children as $child)
                <ul class="dropdown-menu" aria-labelledby="dropdown03">
                    @forelse ($child->children as $grandChild)
                        <li class="dropdown dropdown-submenu dropleft">
                            <a class="dropdown-item dropdown-toggle" href="{{ $child->link() }}" id="dropdown0501"
                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{ $child->title }}</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdown0501">
                                <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                                <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
                            </ul>
                        </li>
                    @empty
                        <li><a class="dropdown-item" href="{{ $child->link() }}">{{ $child->title }}</a></li>
                    @endforelse
                </ul>
            @empty
            @endforelse
        </li>
    @endforeach
</ul>
