@if ($item['submenu'] == [])
    <li>
        <a href="{{ url($item['slug']) }}">{{ $item['nombre'] }} </a>
    </li>
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $item['nombre'] }} <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <li><a href="{{ url('menu',['idmn' => $submenu['idmn'], 'slug' => $submenu['slug']]) }}">{{ $submenu['nombre'] }} </a></li>
                @else
                    @include('menu.menues', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    </li>
@endif