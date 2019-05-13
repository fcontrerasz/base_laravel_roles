@if ($item['submenu'] == [])
    <li>
        <a href="{{ url($item['nombre']) }}">{{ $item['nombre'] }} </a>
    </li>
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['nombre'] }} <span class="caret"></span></a>
        <ul class="dropdown-menu sub-menu">
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