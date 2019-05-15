@section('usuario')
                <li class="nav-header text-center">
                    <div class="profile-element">
                        <img alt="image" class="rounded-circle img-lg" src="{{ asset('img/profile_small.jpg') }}"/>
                        <a href="#">
                            @yield('usuario')
                            <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                        </a>
                    </div>
                    <div class="logo-element">
                        SINERGIA+
                    </div>
                </li>
@endsection

@section('scripts_base')
    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/patache.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
@stop

@section('menues')


        <ul class="nav metismenu" id="side-menu">
                @yield('usuario')

                @foreach ($menus as $key => $item)
                            @if ($item['padre'] != 0)
                                @break
                            @endif
                            @include('menu.menus_admin', ['item' => $item])
                @endforeach
        </ul>

@endsection