<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--    <meta name="og:image" content="http://4t3ixaghsg.preview.infomaniak.website/pages-assets/index_logo_tmp.png?1655381518">-->
    @yield('metas')
    <meta name="og:updated_time" content="1655381518">
    <meta name="og:updated_time" content="1655381518">
    <link rel="icon" href="{{ mix('images/favicons/favicon-32x32.png') }}">
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,800;1,900&display=swap" rel="stylesheet">
    <!-- maptiler integration -->
    <link href='https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css' rel='stylesheet' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @yield('header_scripts')
    @livewireStyles
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/styles.css') }}" rel="stylesheet" type="text/css">

</head>
<body id="page-top">
    <!-- Navigations-->
    <div class="site-overlay"></div>
    <x-top-header />

    @yield('content')

    <!--  whatsapp widget  -->
    <x-floating-footer-menu />
    <!-- Footer-->
    <footer class="bg-dark-immopurple text-center py-5">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; SABLUXIMMOPLUS 2022.</div>
                <a href="{{url('sitemap.xml')}}" target="_blank">Plan du site</a>
                <span class="mx-1">&middot;</span>
                <a href="{{route('see-page', Str::slug('À propos', '_'))}}">À propos</a>
                <span class="mx-1">&middot;</span>
                <a href="{{route('see-page', Str::slug('Informations légales', '_'))}}">Informations légales</a>
                <span class="mx-1">&middot;</span>
                <a href="{{route('see-page', Str::slug('Politique de protection des données', '_'))}}">Politique de protection des données</a>
            </div>
        </div>
    </footer>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V472ZL23HS"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      window.carouselId = 1;
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-V472ZL23HS');
    </script>
    @livewireScripts
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hasMegaMenu = document.querySelectorAll('.has-megamenu');
        const nbrMenu = document.querySelectorAll('.has-megamenu').length;
        const totalWidth = document.querySelector('body').offsetWidth;

        hasMegaMenu.forEach(thisEl => {
            const menuPosition = thisEl.getAttribute('data-position');
            const megaMenu = thisEl.querySelector('.megamenu')
            let width = megaMenu.offsetWidth;
            let height = megaMenu.offsetHeight;
            console.log(width, height);
            if (menuPosition <= (nbrMenu/2)) {
                console.log('it is up '+menuPosition)
                if (width > (totalWidth/2)) {
                    megaMenu.style.left = `calc(15vw + (5vh * ${menuPosition}))`
                } else if(width <= (totalWidth/3)) {
                    megaMenu.style.left = `calc(15vw + (10vh * ${menuPosition}))`
                } else {
                    megaMenu.style.left = `calc(10vw + (8vh * ${menuPosition}))`
                }
            } else if (menuPosition < nbrMenu) {
                if (width > (totalWidth/2)) {
                    megaMenu.style.left = `initial`;
                    megaMenu.style.right = `calc(${width}px / ${menuPosition})`;
                } else if(width <= (totalWidth/3)) {
                    const halfWidth = nbrMenu/2;
                    megaMenu.style.left = `initial`;
                    megaMenu.style.right = `calc(${width}px)`;
                } else {
                    megaMenu.style.left = `initial`;
                    megaMenu.style.right = `calc(${width}px / ${menuPosition})`;
                }
            }
            else {
                megaMenu.style.left = `initial`;
                megaMenu.style.right = `calc(${menuPosition}vh)`;
            }
        });
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('footer_scripts')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
