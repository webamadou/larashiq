
@if (Route::has('login'))
    @auth
        <nav class="relative top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex
        items-center px-4 py-2">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="./index.html"></a>
                <div>
                    <div class="dropdown relative">
                        <a
                            class="dropdown-toggle px-2 py-0 text-sm font-medium text-gray-700
                        hover:bg-gray-50 focus:outline-none outline-none inline-flex rounded-sm"
                            id="user-menu-button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <span>{{ auth()->user()->name }}</span>
                            <img src="{{ asset('images/profile_placeholder.jpeg') }}" alt="mdo" width="32" height="32" class="rounded-circle">
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
                            aria-labelledby="user-menu-button">
<!--                            <li>
                                <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-immogray1"
                                    href="#">Action</a>
                            </li>
                            <li>
                                <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-immogray1"
                                    href="#">Another action</a>
                            </li>-->
                            <li>
                                <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-immogray1" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('common_terms.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        @else
        <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none left-auto right-0" aria-labelledby="dropdownMenuButton2">
            <li>
                <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full
                whitespace-nowrap bg-transparent text-gray-700 hover:bg-immogray1"
                    href="{{ route('login') }}">{{ __('common_terms.login',)}}</a></li>
        </ul>
    @endauth
@endif
