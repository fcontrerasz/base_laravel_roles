@section('usuario')
                <li class="nav-header text-center"> 
                    <div class="profile-element">
                        <?php 
                            $logo = is_null(AppSettings::get('logo', null )) ? 'img/logo_blank.png' : 'storage/'.AppSettings::get('logo') ;
                         ?>
                        <img alt="image" class="img-responsive w-25" src='<?php echo asset("$logo" )?>' />

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
                            @include('menu.menus_admin', ['item' => $item])
                @endforeach

                 
        </ul>

@endsection


