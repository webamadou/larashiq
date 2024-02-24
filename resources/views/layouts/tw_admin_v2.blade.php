<!--

=========================================================
* Notus Tailwind JS - v1.1.0 based on Tailwind Starter Kit by Creative Tim
=========================================================

* Product Page: https://www.creative-tim.com/product/notus-js
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md)

* Tailwind Starter Kit Page: https://www.creative-tim.com/learning-lab/tailwind-starter-kit/presentation

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Immoplus BO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/tw_app.js') }}" defer></script>
    <script src="{{ asset('js/tw_app_v2.js') }}" defer></script>
    @livewireStyles
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="{{ url('images/favicon_io/favicon-32x32.png') }}">
    <!-- form-component -->
    @fcStyles

    <!-- Styles -->
    <link href="{{ mix('css/tw_custom_app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/tw_custom_app_v2.css') }}" rel="stylesheet">
    <link href="{{ mix('css/tw_app_v2.css') }}" rel="stylesheet">
</head>
<body class="text-blueGray-700 antialiased">
    <div id="loader" wire:loading>
        <div class="flex h-100 w-100 justify-center items-center">
            <div class="spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div id="root">
        @include('layouts.partial.tw_sidebar_v2')
        <div class="relative md:ml-64 bg-blueGray-50">
            <!-- Header -->
            @include('layouts.partial.tw_header_v2')
            <div class="px-4 md:px-10 mx-auto w-full">
                <div class="flex flex-wrap mt-4">
                    <div class="body-container w-full mx-0 w-12/12 h-auto overflow-y-auto">
                        <h1 class="text-2xl ml-6">@yield('page-title')</h1>
                        <x-alerts /> <!-- we call the alerts components that will display the alert messages -->
                        @yield('content')
                    </div>
                </div>
                <footer class="block  w-full py-4">
                    <div class="container mx-auto px-4">
                        <hr class="mb-4 border-b-1 border-blueGray-200" />
                        <div
                            class="flex flex-wrap items-center md:justify-between justify-center"
                        >
                            <div class="w-full md:w-4/12 px-4">
                                <div
                                    class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left"
                                >
                                    Copyright © <span id="get-current-year"></span>
                                    <a
                                        href="#"
                                        class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1"
                                    >
                                        SABLUX-IMMOPLUS
                                    </a>
                                </div>
                            </div>
                            <div class="w-full md:w-8/12 px-4">
                                <ul
                                    class="flex flex-wrap list-none md:justify-end justify-center"
                                >
                                    <li>
                                        <a href="-"
                                           class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                            -
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
      id="communDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="" method="POST">
        @csrf
        @method('DELETE')
      <div class="modal-dialog relative w-auto pointer-events-none">
        <div
          class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
          <div
            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
            <h5 class="text-xl font-medium leading-normal text-gray-800" id="modalConfirmationTitle"></h5>
            <button type="button"
              class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
              data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div id="modalConfirmationBody" class="modal-body relative p-4"></div>
          <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
            <button type="button" class="inline-block px-6 text-green-600 font-medium text-xs leading-tight uppercase focus:outline-none focus:ring-0 transition duration-150 ease-in-out" data-bs-dismiss="modal" aria-label="Fermer">Fermer</button>
            <button type="submit" class="inline-block px-6 text-red-600 font-medium text-xs leading-tight uppercase focus:outline-none focus:ring-0 transition duration-150 ease-in-out" aria-label="Confirmer">Confirmer</button>
          </div>
        </div>
      </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      charset="utf-8"
    ></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    @livewireScripts
    <script defer>
        const modalID = document.getElementById("communDeleteModal");
        const confirmationLinks = document.getElementsByClassName("confirmDeletion");

        function confirmationModal()
        {
            return {
                whenDeleteClicked: function(event) {
                    event.stopPropagation();
                    document.getElementById("modalConfirmationTitle").innerHTML = event.target.getAttribute('data-title');
                    document.getElementById("modalConfirmationBody").innerHTML = event.target.getAttribute('data-content');
                    modalID.getElementsByTagName("form")[0].setAttribute("action", event.target.getAttribute('data-action'));
                }
            }
        }
    </script>
    <!-- form-components -->
    @fcScripts
    <x-head.tinymce-config/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    @yield('js_scripts')
</body>
</html>
