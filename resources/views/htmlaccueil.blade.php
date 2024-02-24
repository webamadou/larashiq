<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bienvenue sur sabluximmoplus.com') }}</title>
        <meta name="description" content="Ce site est actuellement en construction.">
        <meta name="keywords" content="Agence immobiliere">
        <meta name="generator" content="hosting-page-builder">
        <meta name="og:url" content="http://4t3ixaghsg.preview.infomaniak.website/index.html">
        <meta name="og:locale" content="">
        <meta name="og:type" content="website">
        <meta name="og:title" content="Bienvenue sur sabluximmoplus.com">
        <meta name="og:description" content="Ce site est actuellement en construction.">
        <meta name="article:publisher" content="ImmoplusSablux">
        <meta name="og:image" content="http://4t3ixaghsg.preview.infomaniak.website/pages-assets/index_logo_tmp.png?1655381518">
        <meta name="og:updated_time" content="1655381518">
        <meta name="og:updated_time" content="1655381518">
        <link rel="icon" href="{{ url('images/favicon_io/favicon-32x32.png') }}">
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        @livewireStyles
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ mix('css/styles.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body id="page-top">
        <!-- Navigations-->
        <div class="site-overlay"></div>
        <nav class="navbar navbar-expand-lg navbar-light p-0 bg-light d-none-xs" id="topNav">
            <div class="container">
                <div class="collapse navbar-collapse" id="topMenuRight">
                    <ul class="navbar-nav m-0 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link me-lg-3 p-0" href="#features">
                                Point E, rue PE-29 Dakar - Senegal - +221 33 869 60 30
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="justify-content-end ms-auto my-3 my-lg-0 navbar-nav">
                        <li class="nav-item"><a class="nav-link px-0" href="#features">
                            <i class="fa fa-pin"></i>Nos Agences</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm py-0" id="mainNav">
            <div class="container">
                <div class="col-2">
                    <a class="navbar-brand fw-bold menu-logo" href="{{route('home-page')}}">
                        <img src="{{mix('images/logo-small.png')}}" alt="sabluximmoplus">
                    </a>
                </div>
                <div id="mainMenuWrapper" class="col-10">
                    <button class="menu-btn float-end mt-2 d-sm-none" type="button" aria-label="menu">
                        Menu
                        <i class="bi-list"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav">
                        @foreach(range(1, 6) as $menu)
                            <li class="nav-item dropdown has-megamenu position-relative"
                                data-position="{{$menu}}"
                            >
                                <a class="nav-link" href="#"
                                   data-submenu="menu{{$menu}}">
                                    Mega menu {{$menu}} <span class="mdi mdi-chevron-down immo-chevron"></span>
                                </a>
                                <div id="menu1"
                                     class="dropdown-menu megamenu position-fixed"
                                     role="menu{{$menu}}">
                                    <div class="row g-3 menu-link-wrapper shadow my-2 py-2">
                                        @foreach(range(1, 3) as $smenu)
                                        <div class="col-4 menu-column">
                                            <h6 class="title">Title Menu One</h6>
                                            <ul class="list-unstyled justify-content-center flex-column m-0">
                                                <li class="mx-2"><a href="#">Custom Menu</a></li>
                                                <li class="mx-2"><a href="#">Custom Menu</a></li>
                                                <li class="mx-2"><a href="#">Custom Menu</a></li>
                                                <li class="mx-2"><a href="#">Custom Menu</a></li>
                                                <li class="mx-2"><a href="#">Custom Menu</a></li>
                                                <li class="mx-2"><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div><!-- end col-3 -->
                                        @endforeach
                                    </div><!-- end row -->
                                </div> <!-- dropdown-mega-menu.// -->
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Pushy mobile Menu -->
        <div class="d-md-none">
            <nav class="pushy pushy-left" data-focus="#first-link">
                <div class="pushy-content">
                    <ul>
                        @foreach(range(1, 6) as $menu)
                            <li class="pushy-submenu">
                                <button aria-label="Submenu">Submenu {{$menu}}</button>
                                <ul>
                                    @foreach(range(1, 3) as $smenu)
                                        <li class="pushy-link"><a href="#">Item {{$smenu}}</a></li>
                                        <li class="pushy-link"><a href="#">Item {{$menu}}</a></li>
                                        <li class="pushy-link"><a href="#">Item {{$menu}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center--">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 m; text-center text-lg-start bilboard-messages">
                            <h1 class="display-5 lh-1 mt-3">
                                Acquérir une de nos villas, c'est s'assurer un cadre de vie paisible et sécurisé
                            </h1>
                            <!-- <div class="d-flex flex-column flex-lg-row align-items-center">
                                <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                                <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-lg-6 bg-light p-4 shadow-lg position-relative" id="homeSearchWrapper">
                        <!-- Masthead search form-->
                        <nav id="myTab">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active"
                                        id="nav-rent-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#nav-rent"
                                        type="button"
                                        role="tab"
                                        aria-controls="nav-rent"
                                        aria-selected="true"
                                        aria-label="louer">Louer</button>
                                <button class="nav-link"
                                        id="nav-buy-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#nav-buy"
                                        type="button"
                                        role="tab"
                                        aria-controls="nav-buy"
                                        aria-selected="false"
                                        aria-label="acheter">Acheter</button>
                                <button class="nav-link"
                                        id="nav-estimation-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#nav-estimation"
                                        type="button"
                                        role="tab"
                                        aria-controls="nav-estimation"
                                        aria-selected="false"
                                        aria-label="estimation">Estimation</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-rent" role="tabpanel"
                                 aria-labelledby="nav-rent-tab" tabindex="0">
                                <div class="formWrapper">
                                    <h4 class="mb-2 my-4">1234 biens disponibles</h4>
                                    <form class="row g-3">
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="localisation"
                                                   aria-label="localisation"
                                                   aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1"><span class="mdi mdi-google-maps"></span></span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="budget"
                                                   aria-label="budget"
                                                   aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1"><span class="mdi mdi-cash-multiple"></span></span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="surface"
                                                   aria-label="surface"
                                                   aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1"><span class="mdi mdi-land-fields"></span></span>
                                        </div>
                                        <div class="col-12 mb-4 flex justify-content-center">
                                            <div class="checkboxes">
                                                <label class="checkbox blue">
                                                    <input value="1" checked="<%= true %>" type="checkbox"></input>
                                                    <span class="indicator"></span>
                                                    Appartement
                                                </label>
                                                <label class="checkbox blue">
                                                    <input value="2" checked="<%= true %>" type="checkbox"></input>
                                                    <span class="indicator"></span>
                                                    Terrain
                                                </label>
                                                <label class="checkbox blue">
                                                    <input value="3" checked="<%= true %>" type="checkbox"></input>
                                                    <span class="indicator"></span>
                                                    Appartement
                                                </label>
                                                <label class="checkbox blue">
                                                    <input value="4" checked="<%= true %>" type="checkbox"></input>
                                                    <span class="indicator"></span>
                                                    Appartement
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 flex justify-content-center seach-submiter position-absolute">
                                            <button type="submit" class="btn btn-primary" aria-label="Rechercher">
                                                <span class="mdi mdi-magnify"></span>Rechercher
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-buy" role="tabpanel" aria-labelledby="nav-profile-tab"
                                 tabindex="0">
                                2
                            </div>
                            <div class="tab-pane fade" id="nav-estimation" role="tabpanel"
                                 aria-labelledby="nav-contact-tab"
                                 tabindex="0">
                                3
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mx-auto" id="call-to-actions">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{route('create-alert')}}" class="btn btn-primary btn-lg px-4 gap-3">
                        <span class="mdi mdi-laptop"></span>
                        {{__('front.estimate')}}
                    </a>
                    <a href="{{route('create-estimation')}}" class="btn btn-outline-secondary btn-lg px-4 bg-light">
                        <span class="mdi mdi-bell-badge"></span>
                        {{__('front.create_alert')}}
                    </a>
                </div>
            </div>
        </header>
        <!-- properties section-->
        <section class="text-center --bg-gradient-primary-to-secondary" id="list-properties-wrapper">
            <div class="container">
                <h2 class="section-title">{{__('front.last_published_props')}}</h2>
                <div class="row justify-content-center prop-vignettes-wrapper">
                    @foreach(range(1, 3) as $prop)
                        <div class="col-lg-4 col-md-6 col-sm-12 position-relative prop-vignette-wrapper">
                            <div class="prop-vignette">
                                <div class="prop-vignette-body-wrapper">
                                    <div class="prop-image">
                                        <img src="{{mix('images/img'.$prop.'.jpg')}}" alt="prop title">
                                    </div>
                                    <ul class="prop-badges">
                                        <li class="bg-red-600 bg-danger">Exclusivite</li>
                                        <li class="bg-red-600 bg-immopurple">Visite Virtuelle</li>
                                    </ul>
                                    <ul class="prop-metas">
                                        <li>
                                            <a href="#"><span class="mdi mdi-camera-outline"></span> 122</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="prop-vignette-footer-wrapper">
                                    <div class="title-price">
                                        <div class="title">
                                            <a href="">This is the title of our property</a>
                                        </div>
                                        <div class="price price-format">
                                            <a href="#">800 000 Fcfa</a>
                                        </div>
                                    </div>
                                    <div class="address">Point-E - Dakar</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Quote/testimonial aside-
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">"An intuitive solution to a common problem that we all face, wrapped up in a single app!"</div>
                        <img src="assets/img/tnw-logo.svg" alt="..." style="height: 3rem" />
                    </div>
                </div>
            </div>
        </aside> -->
        <!-- App features section-->
        <section id="features" class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt stat-title"><span class="mdi mdi-home-city"></span>
                                            1234</h3>
                                        <p class="text-muted mb-0">Biens</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-camera icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt stat-title"><span class="mdi mdi-emoticon"></span> +350</h3>
                                        <p class="text-muted mb-0">Clients satisfaits</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt stat-title"><span class="mdi mdi-history"></span> 10</h3>
                                        <p class="text-muted mb-0">ans d’activité</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt stat-title"><span class="mdi mdi-map-legend"></span>
                                            Présent</h3>
                                        <p class="text-muted mb-0">partout au Sénégal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="https://source.unsplash.com/u8Jn2rzYIps/900x900" alt="..." /></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- properties section-->
        <section class="text-center --bg-gradient-primary-to-secondary" id="list-posts-wrapper">
            <div class="container">
                <h2 class="section-title">{{__('front.last_published_posts')}}</h2>
                <div class="row justify-content-center prop-vignettes-wrapper">
                    @foreach(range(1, 3) as $prop)
                        <div class="col-lg-4 col-md-6 col-sm-12 position-relative prop-vignette-wrapper">
                            <div class="prop-vignette">
                                <div class="prop-vignette-body-wrapper">
                                    <div class="prop-image">
                                        <a href="#"><img src="{{mix('images/img'.$prop.'.jpg')}}" alt="prop title"></a>
                                    </div>
                                    <ul class="prop-badges">
                                        <li class="bg-red-600 bg-immopurple category">category name</li>
                                    </ul>
                                </div>
                                <div class="prop-vignette-footer-wrapper">
                                    <div class="title-price">
                                        <div class="article-title">
                                            <a href="">
                                                {{Str::words('Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Consequuntur corporis harum ipsam, labore obcaecati repellat
                                                vitae? Accusamus accusantium, asperiores cupiditate debitis dolores
                                                ipsum laboriosam nostrum, quidem ratione recusandae sunt tempora.',
                                                12, '...')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Basic features section
        <section class="bg-white">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <h2 class="display-4 lh-1 mb-4">Enter a new age of web design</h2>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">This section is perfect for featuring some information about your application, why it was built, the problem it solves, or anything else! There's plenty of space for text here, so don't worry about writing too much.</p>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="https://source.unsplash.com/u8Jn2rzYIps/900x900" alt="..." /></div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- Social section-->
        <section class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-sm-6 newsletter-wrapper">
                                <h3 class="mb-4">Ne manquez plus nos actualités et conseils !</h3>
                                <p>Conseils, chiffres clés, marché… Notre équipe met tout en oeuvre pour que vous ne ratiez aucune opportunité business !</p>
                                <form class="form-subscribe" id="contactFormSocial">
                                    <!-- Email address input-->
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control rounded-0" id="emailAddressBelow"
                                                   type="email" placeholder="Email Address" data-sb-validations="required,email" data-sb-can-submit="no">
                                            <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:required">Email Address is required.</div>
                                            <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:email">Email Address Email is not valid.</div>
                                        </div>
                                        <div class="col-auto"><button class="btn btn-primary rounded-0 disabled"
                                                                      id="submitButton"
                                                                      type="submit"
                                                                      aria-label="Envoyer">Envoyer</button></div>
                                    </div>
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            <p>To activate this form, sign up at</p>
                                            <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                </form>
                            </div>
                            <div class="col-sm-4 offset-2 socials-wrapper">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-4">
                                        <a href="#!"><span class="mdi mdi-facebook"></span></a>
                                    </li>
                                    <li class="list-inline-item me-4">
                                        <a href="#!"><span class="mdi mdi-twitter"></span></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#!"><span class="mdi mdi-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to action section
        <section class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <h2 class="text-white display-1 lh-1 mb-4">
                        Stop waiting.
                        <br />
                        Start building.
                    </h2>
                    <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Download for free</a>
                </div>
            </div>
        </section>-->
        <!-- App badge section
        <section class="bg-gradient-primary-to-secondary" id="download">
            <div class="container px-5">
                <h2 class="text-center text-white font-alt mb-4">Get the app now!</h2>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                    <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
                </div>
            </div>
        </section>-->
        <!-- Footer-->
        <footer class="bg-dark-immopurple text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; SABLUXIMMOPLUS 2022.</div>
                    <a href="#!">Plan du site</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Informations légales</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Politique de protection des données</a>
                </div>
            </div>
        </footer>
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
    </body>
</html>
