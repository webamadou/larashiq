<div>
    <nav class="navbar navbar-expand-lg navbar-light p-0 bg-light d-none-xs" id="topNav">
        <div class="container">
            <div class="collapse navbar-collapse" id="topMenuRight">
                <ul class="navbar-nav m-0 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-lg-3 p-0" href="#features">
                            {{ $configs->official_address }} - {{ $configs->official_phone_nums }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="justify-content-end ms-auto my-lg-0 navbar-nav">
                    <li class="nav-item mx-4 d-inline-block">
                        <a class="nav-link px-0" href="#" title="{{__('common_terms.search')}}">
                            <span class="mdi mdi-home-search"></span> {{__('common_terms.search')}}</a>
                    </li>
                    <li class="nav-item mx-4 d-inline-block">
                        <a class="nav-link px-0" href="#">
                            <span class="mdi mdi-home-switch"></span> {{__('front.our_agencies')}}</a>
                    </li>
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item d-inline-block"><a class="nav-link px-0" href="{{route
                            ('mon-compte')}}">
                            <span class="mdi mdi-account"></span> {{__('common_terms.my_account')}}</a>
                    </li>
                    <li class="nav-item d-inline-block">
                        <a class="nav-link px-0" href="{{ route('logout') }}"
                           title="{{__('common_terms.logout')}}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="mdi mdi-logout"></span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="nav-item d-inline-block">
                        <a class="nav-link px-0" href="{{route ('login')}}">
                            <span class="mdi mdi-account"></span>{{__('common_terms.my_account')}}
                        </a>
                    </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
