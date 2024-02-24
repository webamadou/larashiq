    <header class="container blog-header py-3 mb-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary logo-link" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png')}}" alt="{{config('app.name', 'Immoplus')}}">
                </a>
            </div>
            <div class="col-8 d-flex justify-content-end align-items-center">
                <div class="flex-shrink-0 dropdown">
                @if (Route::has('login'))
                    @auth
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>{{ auth()->user()->name }}</span>
                        <img src="{{ asset('images/profile_placeholder.jpeg') }}" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    @else
                    <ul class="nav">
                        <li class="nav-item">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline nav-link active"><i class="fa fa-user"></i> {{ __('common_terms.login',)}}</a>
                        </li>
                        <li class="nav-item">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline nav-link active"><i class="fa fa-user-plus"></i> {{ __('common_terms.register') }}</a>
                        @endif
                        </li>
                    </ul>
                    @endauth
                @endif
                </div>
            </div>
        </div>
    </header>
    </div>
