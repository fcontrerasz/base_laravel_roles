@section('usuario')
                <li class="nav-header text-center"> 
                    <div class="profile-element">
                        <img alt="image" class="" src="{{ asset('img/logo_blank.png') }}"/>
                    </div>
                </li>
@endsection

@section('menues')


        <ul class="nav metismenu" id="side-menu">
                @yield('usuario')
                @foreach ($menus as $key => $item)
                            @if ($item['padre'] != 0)
                                @break
                            @endif
                            @include('menu.menus_admin_vue', ['item' => $item])
                @endforeach

                 
        </ul>

@endsection