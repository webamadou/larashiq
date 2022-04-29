    <header class="container blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
            <a class="link-secondary logo-link" href="#">
                <img src="{{ asset('images/logo.svg')}}" alt="">
            </a>
            </div>
            <div class="col-8 d-flex justify-content-end align-items-center">
            <div class="flex-shrink-0 dropdown">
            @if (Route::has('login'))
                @auth
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Administrator</span>
                    <img src="{{ asset('images/profile_placeholder.jpeg') }}" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
                @else
                <ul class="nav">
                    <li class="nav-item">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline nav-link active"><i class="fa fa-user"></i> {{ __('user_form_terms.login',)}}</a>
                    </li>
                    <li class="nav-item">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline nav-link active"><i class="fa fa-user-plus"></i> {{ __('user_form_terms.register') }}</a>
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
    @auth
        <div class="menu-container">
            <div class="container nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-end">
                    <a class="p-2 link-secondary active" href="#">World</a>
                    <a class="p-2 link-secondary" href="#">U.S.</a>
                    <a class="p-2 link-secondary" href="#">Technology</a>
                    <a class="p-2 link-secondary" href="#">Design</a>
                    <a class="p-2 link-secondary" href="#">Culture</a>
                    <a class="p-2 link-secondary" href="#">Business</a>
                    <a class="p-2 link-secondary" href="#">Politics</a>
                    <a class="p-2 link-secondary" href="#">Opinion</a>
                    <a class="p-2 link-secondary" href="#">Science</a>
                    <a class="p-2 link-secondary" href="#">Health</a>
                    <a class="p-2 link-secondary" href="#">Style</a>
                    <a class="p-2 link-secondary" href="#">Travel</a>
                </nav>
            </div>
        </div>
    @endauth
