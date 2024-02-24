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

    <title>{{ config('app.name', 'Immoplus BO') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tw_app.js') }}" defer></script>
    @livewireStyles
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="{{ url('images/favicon_io/favicon-32x32.png') }}">
    <!-- form-component -->
    @fcStyles
    <!-- Styles -->
    <link href="{{ mix('css/tw_custom_app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/tw_app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="loader" wire:loading>
        <div class="flex h-100 w-100 justify-center items-center">
            <div class="spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    @include('layouts.partial.tw_header')
    <main class="w-full relative">
        <div class="flex space-x-0 px-0">
            <div id="content-wrapper" class="relative w-full mx-auto flex pt-6">
                @include('layouts.partial.tw_sidebar')
                <div class="container body-container col-9 mx-0 px-4 mt-5 w-10/12 h-auto overflow-y-auto">
                  <h1 class="text-2xl ml-6">@yield('page-title')</h1>
                  <x-alerts /> <!-- we call the alerts components that will display the alert messages -->
                  @yield('content')
                </div>
            </div>
        </div>
    </main>
    <footer class="w-full bg-slate-900">
      <div class="relative container bg-gray-300 mx-auto py-6">
        <div class="flex items-center justify-between px-16">
          <ul class="flex pb-3 mb-3">
            <!--<li class="nav-item">
              <a href="#" class="nav-link px-2 text-muted">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-muted">Features</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-muted">Pricing</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-muted">FAQs</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-muted">About</a>
            </li>-->
          </ul>
          <div class="flex space-x-6">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <!--<div class="text-white text-xs">&copy; sablux 2022</div>-->
          </div>
        </div>
      </div>
    </footer>
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
            <button type="submit" class="inline-block px-6 text-red-600 font-medium text-xs leading-tight uppercase focus:outline-none focus:ring-0 transition duration-150 ease-in-out" aria-label="Confimer">Confirmer</button>
          </div>
        </div>
      </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    @livewireScripts
    <script>
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
