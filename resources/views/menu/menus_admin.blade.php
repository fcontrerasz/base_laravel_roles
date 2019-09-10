@if ($item['submenu'] == [])
    <li>
      <!--  <a href="{{ url($item['slug']) }}">{{ $item['nombre'] }} </a> -->
        <router-link :to="{name: '{{ $item['slug'] }}'}">{{ $item['nombre'] }}</router-link>

    </li>
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['nombre'] }}</a>
        <ul class="nav nav-second-level collapse">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <!--<li><a href="{{ url('menu',['idmn' => $submenu['idmn'], 'slug' => $submenu['slug']]) }}">{{ $submenu['nombre'] }} </a></li>-->
                    <li><router-link :to="{name: '{{ $item['slug'] }}'}">{{ $submenu['nombre'] }}</router-link></li>
                @else
                    @include('menu.menus_admin', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    </li>
@endif