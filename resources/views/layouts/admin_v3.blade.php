<!DOCTYPE html>
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
    <!-- Datatable CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="{{ asset('js/app_v3.js') }}" defer></script>
    <!-- Alpine CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="{{ url('images/favicons/favicon-32x32.png') }}">
    <!-- form-component -->
    @fcStyles

    <!-- Styles -->
    <!-- datatables CDN -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/bundle_style_v3.css') }}" rel="stylesheet">
    <link href="{{ mix('css/style_v3.css') }}" rel="stylesheet">
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('images/logo.png')}}" alt="{{config('app.name', 'Immoplus')}}" style="height: auto"></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo.png')}}" alt="{{config('app.name', 'Immoplus')}}" style="height: auto"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#" title="{{ __('common_terms.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.partial.sidebar_v3')
        <!-- partial -->
        <div class="main-panel">
          @yield('content')

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © {{env('APP_URL')}} {{date('Y')}}</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end">  <a href="{{env('APP_URL')}}" target="_blank">DASHBOARD</a> par {{env('APP_NAME')}}</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  @stack('scripts')
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
  </body>
</html>
