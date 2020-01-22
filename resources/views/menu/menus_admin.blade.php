@if ($item['submenu'] == [])
    <li>
        <a href="{{ url($item['slug']) }}">{{ $item['nombre'] }} </a>
    </li>
@else

    <li>
    <a href="#" aria-expanded="false"><span class="nav-level">{{ $item['nombre'] }}</span>
    <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <li><a href="{{ url($submenu['slug']) }}">{{ $submenu['nombre'] }} </a></li>
                @else
                    @include('menu.menues', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    </li>

@endif