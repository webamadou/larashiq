<!-- ===========MENU SIMPLE============== -->
<div>
    <div class="navbar navbar-expand-lg navbar-light shadow-sm py-0 " id="mainNav">
        <div class="container">
            <div class="row immo-grid immo-grid--custom immo-grid--nowrap header-items-wrapper">
                <div class="col-2 logo-wrapper">
                    <span class="">
                        <a class="navbar-brand fw-bold menu-logo" href="{{route('home-page')}}">
                            <img src="{{asset('/images/logo-small.png')}}" alt="sabluximmoplus">
                        </a>
                    </span>
                </div>
                <div id="mobile-menu-toggler" class="col-10 justify-content-end">
                    <button class="btn btn-primary rounded-0 menu-btn" type="button" aria-label="Menu">
                        Menu
                        <i class="bi-list"></i>
                    </button>
                </div>
                <div class="col-10 px-0" id="mega-menu-wrapper">
                    <nav aria-label="Main Navigation" id="navigation-primary" class="immo-c-nav immo-c-header__nav w-75">
                        <ul role="menubar" class="immo-c-nav__list immo-c-header__nav-list my-0">
                            <!-- louer -->
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-rent-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.rent')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-rent" class="immo-c-submenu immo-c-nav__submenu" aria-label="Sous-menu: Louer">
                                    <div class="immo-grid-- immo-grid--custom-- o-grid--none-- o-grid--1@md-- o-grid--1@sm--">
                                        <div class="immo-grid__col-- px-3 o-grid__col--4-- c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-home-city"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-rent', 'appartements')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-domain"></span> Appartements</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('rent-furnished-by-type', 'appartements')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                               <span class="mdi mdi-table-furniture"></span> Appartements
                                                                meublés</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-rent', 'villa')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                               <span class="mdi mdi-home-city"></span> Villas</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('rent-categorie', 'immobiliers_professionnels')}}"
                                                                class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-office-building"></span> Immobiliers professionnels</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- acheter -->
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-rent-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.buy')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-buy" class="immo-c-submenu immo-c-nav__submenu" aria-label="Sous-menu:
                                 acheter">
                                    <div class="immo-grid-- immo-grid--custom-- o-grid--none-- o-grid--1@md-- o-grid--1@sm--">
                                        <div class="immo-grid__col-- px-3 o-grid__col--4-- c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-home-city"></span></p>
                                                </div>
                                                <div>

                                                <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-buy', 'appartements')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-domain"></span> Appartements</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-buy', 'villa')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                               <span class="mdi mdi-home-city"></span> Villas</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-buy', 'terrains')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                               <span class="mdi mdi-land-fields"></span> Terrains</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('buy-categorie', 'immobiliers_professionnels')}}"
                                                                class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-office-building"></span> Immobiliers professionnels</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Meubler -->
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-estimate-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.laying_out')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-estimate" class="immo-c-submenu immo-c-nav__submenu"
                                     aria-label="Sous-menu: manage">
                                    <div class="immo-grid-- immo-grid--custom-- o-grid--none-- o-grid--1@md-- o-grid--1@sm--">
                                        <div class="immo-grid__col-- px-3 o-grid__col--4-- c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-newspaper"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-post', 'parties_communes_appartements')}}"
                                                                class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-post-outline"></span> Parties
                                                                communes -
                                                                appartements
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-post', 'retour_sur_investissement_apres_ameublement')}}"
                                                                class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-post-outline"></span> Retour sur
                                                                investissement
                                                                après
                                                                ameublement
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('blog')}}"
                                                                class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-post"></span> Blog
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- immo pro -->
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-estimate-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.immo_pro')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-estimate" class="immo-c-submenu immo-c-nav__submenu"
                                     aria-label="Sous-menu: manage">
                                    <div class="immo-grid-- immo-grid--custom-- o-grid--none-- o-grid--1@md-- o-grid--1@sm--">
                                        <div class="immo-grid__col-- px-3 o-grid__col--4-- c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-newspaper"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="#"
                                                                class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-apple-keyboard-option"></span>
                                                                Futura
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-rent', 'office')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                               <span class="mdi mdi-chair-rolling"></span> Plateaux de bureau</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-rent', 'magasin')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                               <span class="mdi mdi-store"></span> Commerces</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pushy mobile Menu -->
<div>
    <nav class="pushy pushy-left" data-focus="#first-link">
        <div class="pushy-content">
            <ul>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button wire:click.prevent="setMenu('louer')" aria-label="Supprimer" aria-label="Louer">Louer</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-rent', 'appartements')}}" class="c-link c-link--reverse c-submenu__link"> Appartements</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('rent-furnished-by-type', 'appartements')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Appartements meublés</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-rent', 'villa')}}"
                                       class="c-link c-link--reverse c-submenu__link">
                                       Villas</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('rent-categorie', 'immobiliers_professionnels')}}"
                                        class="c-link c-link--reverse c-submenu__link">
                                        Immobiliers professionnels</a>
                        </li>
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button wire:click.prevent="setMenu('acheter')" aria-label="Acheter">Acheter</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-buy', 'appartements')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Appartements</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-buy', 'villa')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Villas</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-buy', 'terrains')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Terrains</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('buy-categorie', 'immobiliers_professionnels')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Immobiliers professionnels</a>
                        </li>
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button aria-label="Front">{{__('front.laying_out')}}</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="{{route('see-post', 'parties_communes_appartements')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Parties communes - appartements
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-post', 'retour_sur_investissement_apres_ameublement')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Retour sur investissement après ameublement
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('blog')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Blog
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button aria-label="{{__('front.immo_pro')}}">{{__('front.immo_pro')}}</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="#"
                                class="c-link c-link--reverse c-submenu__link">
                                Futura
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-rent', 'office')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                Plateaux de bureau
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-rent', 'magasin')}}"
                                       class="c-link c-link--reverse c-submenu__link">
                                       Commerces</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- ===========MENU SIMPLE============== -->
<div>
    <div class="navbar navbar-expand-lg navbar-light shadow-sm py-0 " id="mainNav">
        <div class="container">
            <div class="row immo-grid immo-grid--custom immo-grid--nowrap header-items-wrapper">
                <div class="col-2 logo-wrapper">
                    <span class="">
                        <a class="navbar-brand fw-bold menu-logo" href="{{route('home-page')}}">
                            <img src="{{asset('/images/logo-small.png')}}" alt="sabluximmoplus">
                        </a>
                    </span>
                </div>
                <div id="mobile-menu-toggler" class="col-10 justify-content-end">
                    <button class="btn btn-primary rounded-0 menu-btn" type="button" aria-label="Menu">
                        Menu
                        <i class="bi-list"></i>
                    </button>
                </div>
                <div class="col-10 px-0" id="mega-menu-wrapper">
                    <nav aria-label="Main Navigation" id="navigation-primary" class="immo-c-nav immo-c-header__nav">
                        <ul role="menubar" class="immo-c-nav__list immo-c-header__nav-list my-0">
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-rent-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.rent')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-rent" class="immo-c-submenu immo-c-nav__submenu" aria-label="Sous-menu: Louer">
                                    <div class="immo-grid immo-grid--custom o-grid--none o-grid--1@md o-grid--1@sm">
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-home-city"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-rent-home-flat')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Appartements et maisons</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-rent', 'immeubles')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Immeubles</a>
                                                        </li>
                                                        @foreach($categories as $category)
                                                            <li role="menuitem" class="c-submenu__item">
                                                                <a
                                                                    href="{{route('rent-categorie', $category->slug)}}"
                                                                    class="c-link c-link--reverse c-submenu__link">
                                                                    {{ $category->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <i class="c-icon u-text-icon-xs u-color-primary u-mr-xs">
                                                            <span class="mdi mdi-laptop"></span>
                                                        </i>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-alert')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Créer une alerte mail</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-meeting')}}" class="c-link c-link--reverse c-submenu__link">
                                                                Prendre rendez-vous</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-newspaper"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <ul role="menu">
                                                            @foreach($posts
                                                                ->where('category_id', 2)
                                                                ->take(4)
                                                                ->all() as $post)
                                                                <li role="menuitem" class="c-submenu__item">
                                                                    <a href="{{route('see-post', $post->slug)}}"
                                                                       class="c-link c-link--reverse c-submenu__link">
                                                                        {{$post->name}}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-rent-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.buy')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-buy" class="immo-c-submenu immo-c-nav__submenu" aria-label="Sous-menu:
                                 acheter">
                                    <div class="immo-grid immo-grid--custom o-grid--none o-grid--1@md o-grid--1@sm">
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-home-city"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-buy-home-flat')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Appartements et maisons</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-buy', 'immeubles')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Immeubles</a>
                                                        </li>
                                                        @foreach($categories as $category)
                                                            <li role="menuitem" class="c-submenu__item">
                                                                <a
                                                                    href="{{route('buy-categorie', $category->slug)}}"
                                                                    class="c-link c-link--reverse c-submenu__link">
                                                                    {{ $category->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <i class="c-icon u-text-icon-xs u-color-primary u-mr-xs">
                                                            <span class="mdi mdi-laptop"></span>
                                                        </i>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-alert')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Créer une alerte mail</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-meeting')}}" class="c-link c-link--reverse c-submenu__link">
                                                                Prendre rendez-vous</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-newspaper"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <ul role="menu">
                                                            @foreach($posts
                                                                ->where('category_id', 1)
                                                                ->take(4)
                                                                ->all() as $post)
                                                                <li role="menuitem" class="c-submenu__item">
                                                                    <a href="{{route('see-post', $post->slug)}}"
                                                                       class="c-link c-link--reverse c-submenu__link">
                                                                        {{$post->name}}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-buy-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.sell')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-buy" class="immo-c-nav__submenu immo-c-submenu" aria-label="Sous-menu: Acheter">
                                    <div class="immo-grid o-grid--1@sm immo-grid--custom o-grid--none">
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-home-city"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-estimation')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Estimer en ligne la valeur de mon bien</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-meeting')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Prendre rendez-vous</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <div class="c-submenu__content c-submenu__content--header">
                                                        <p>
                                                            <span class="mdi mdi-book-open-page-variant"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Conseil 1', '_'))}}" class="c-link c-link--reverse c-submenu__link">
                                                                Conseil 1
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Conseil 2', '_'))
                                                            }}" class="c-link c-link--reverse c-submenu__link">
                                                               Conseil 2
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Conseil 3', '_'))
                                                            }}" class="c-link c-link--reverse c-submenu__link">
                                                                Conseil 3
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="u-mt-md">
                                                        <a href="{{route('see-post-categories', Str::slug("Vendre", '_'))}}"
                                                           class="btn btn-primary rounded-0">
                                                            Voir tous les conseils
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-newspaper"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        @foreach($posts->where('category_id', 4)->take(3)->all()
                                                        as $post)
                                                            <li role="menuitem" class="c-submenu__item">
                                                                <a href="{{route('see-post', $post->slug)}}"
                                                                   class="c-link c-link--reverse c-submenu__link">
                                                                    {{$post->name}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-buy-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.manage')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-manage" class="immo-c-nav__submenu immo-c-submenu" aria-label="Sous-menu:
                                Faire gerer">
                                    <div class="immo-grid o-grid--1@sm immo-grid--custom o-grid--none">
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-book-open-page-variant"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Le mandat de
                                                            gestion locative', '_'))}}"
                                                             class="c-link c-link--reverse c-submenu__link">
                                                                Le mandat de gestion locative
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Le mandat de
                                                            location', '_'))}}"
                                                             class="c-link c-link--reverse c-submenu__link">
                                                                Le mandat de location
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Le mandat de
                                                            location saisonnière', '_'))}}"
                                                             class="c-link c-link--reverse c-submenu__link">
                                                                Le mandat de location saisonnière
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Travaux/Réfections', '_'))}}"
                                                             class="c-link c-link--reverse c-submenu__link">
                                                                Travaux/Réfections
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-laptop"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Estimer en ligne
                                                            le loyer de votre bien', '_'))}}" class="c-link
                                                            c-link--reverse c-submenu__link">
                                                                Estimer en ligne le loyer de votre bien
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Estimer en agence le loyer de votre bien', '_'))}}" class="c-link c-link--reverse c-submenu__link">
                                                                Estimer en agence le loyer de votre bien
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-newspaper"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-post', Str::slug('Pourquoi estimer avant de vendre ?', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Pourquoi estimer avant de vendre ?
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-post', Str::slug("Comprendre l'estimation immobilière", '_'))}}" class="c-link c-link--reverse c-submenu__link">
                                                                Comprendre l'estimation immobilière
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-post-categories', Str::slug("Faire gérer", '_'))}}"
                                                               class="btn btn-primary rounded-0">
                                                                Voir tous les conseils</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-estimate-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.laying_out')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                        <span class="current-link-indicator"></span>
                                    </span>
                                </a>
                                <div id="submenu-estimate" class="immo-c-submenu immo-c-nav__submenu"
                                     aria-label="Sous-menu: manage">
                                    <div class="immo-grid immo-grid--custom o-grid--none o-grid--1@md o-grid--1@sm">
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-notebook-multiple"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Nos projets', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Nos projets
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-meeting')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Prendre rendez-vous</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-book-open-page-variant"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Décoration intérieure', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Décoration intérieure
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('catalogues')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Packs ammeublement
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Home staging', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                Home staging
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-newspaper"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        @foreach($posts->where('category_id', 6)->take(3)->all() as $post)
                                                            <li role="menuitem" class="c-submenu__item">
                                                                <a href="{{route('see-post', $post->slug)}}"
                                                                   class="c-link c-link--reverse c-submenu__link">
                                                                    {{$post->name}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
<!--                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" id="submenu-property-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text&#45;&#45;arrow immo-c-arrow">
                                        <span>{{__('front.syndic')}}</span>
                                        <i class="c-icon c-icon&#45;&#45;close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                    </span>
                                </a>
                                <div id="submenu-property" class="immo-c-submenu immo-c-nav__submenu" aria-label="Sous-menu: Syndic">
                                    <div class="immo-grid immo-grid&#45;&#45;custom o-grid&#45;&#45;none o-grid&#45;&#45;1@md o-grid&#45;&#45;1@sm">
                                        <div class="immo-grid__col o-grid__col&#45;&#45;4 o-grid__col&#45;&#45;offset-3@md-plus c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content&#45;&#45;header">
                                                    <p><span class="mdi mdi-newspaper"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu" class="u-list-unstyled u-mt-n">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Le mandat de syndic', '_'))}}"
                                                               class="c-link c-link&#45;&#45;reverse c-submenu__link">
                                                                Le mandat de syndic
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Extranet copropriétaire', '_'))}}"
                                                               class="c-link c-link&#45;&#45;reverse c-submenu__link">
                                                                Extranet copropriétaire
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Prise de rendez-vous', '_'))}}"
                                                               class="c-link c-link&#45;&#45;reverse c-submenu__link">
                                                                Prise de rendez-vous
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col&#45;&#45;4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content&#45;&#45;header">
                                                    <p><span class="mdi mdi-laptop"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        @foreach($posts->where('category_id', 4)->take(3)->all() as $post)
                                                            <li role="menuitem" class="c-submenu__item">
                                                                <a href="{{route('see-post', $post->slug)}}"
                                                                   class="c-link c-link&#45;&#45;reverse c-submenu__link">
                                                                    {{$post->name}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <p class="u-mt-auto u-pt-md">
                                                        <a href="{{route('see-post-categories', 'syndic')}}" class="btn
                                                        btn-primary rounded-0">
                                                            Voir tous les articles</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>-->
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#"
                                   class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">Immobilier Pro</span>
                                </a>
                            </li>
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="{{$configuration->customer_space_url}}" target="_blank"
                                   class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">Espace Client</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pushy mobile Menu -->
<div>
    <nav class="pushy pushy-left" data-focus="#first-link">
        <div class="pushy-content">
            <ul>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button wire:click.prevent="setMenu('louer')" aria-label="Louer">Louer</button>
                    <ul>
                        <li class="pushy-link"><a href="{{route('acquisition-type-rent-home-flat')}}">Appartements et maisons</a></li>
                        <li class="pushy-link"><a href="{{route('acquisition-type-rent', 'immeuble')}}">Immeubles</a></li>
                        @foreach($categories as $category)
                            <li class="pushy-link">
                                <a href="{{route('rent-categorie', $category->slug)}}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                        <li class="pushy-link"><a href="{{route('create-alert')}}">Créer une alerte mail</a></li>
                        <li class="pushy-link"><a href="{{route('create-meeting')}}">Prendre rendez-vous</a></li>
                        @foreach($posts->where('category_id', 2)->take(4)->all() as $post)
                            <li class="pushy-link"><a href="{{route('see-post', $post->slug)}}">{{$post->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button wire:click.prevent="setMenu('acheter')" aria-label="Acheter">Acheter</button>
                    <ul>
                        <li class="pushy-link"><a href="{{route('acquisition-type-buy-home-flat')}}">Appartements et maisons</a></li>
                        <li class="pushy-link"><a href="{{route('acquisition-type-buy', 'immeuble')}}">Immeubles</a></li>
                        @foreach($categories as $category)
                            <li class="pushy-link">
                                <a href="{{route('buy-categorie', $category->slug)}}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                        <li class="pushy-link"><a href="{{route('buy-categorie', 'immobiliers_professionnels')}}">Immobiliers professionnels</a></li>
                        <li class="pushy-link"><a href="{{route('buy-categorie', 'biens_a_linternational')}}">Biens à l'international</a></li>
                        <li class="pushy-link"><a href="{{route('create-alert')}}">Créer une alerte mail</a></li>
                        <li class="pushy-link"><a href="{{route('create-meeting')}}">Prendre rendez-vous</a></li>
                        @foreach($posts->where('category_id', 1) ->take(4) ->all() as $post)
                            <li class="pushy-link">
                                <a href="{{route('see-post', $post->slug)}}"
                                class="c-link c-link--reverse c-submenu__link">{{$post->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button aria-label="{{__('front.sell')}}">{{__('front.sell')}}</button>
                    <ul>
                        <li class="pushy-link"><a href="{{route('create-estimation')}}">Estimer en ligne la valeur de mon bien</a></li>
                        <li class="pushy-link"><a href="{{route('create-meeting')}}">Prendre rendez-vous</a></li>
                        <li class="pushy-link"><a href="{{route('see-page', Str::slug('Conseil 1', '_'))}}">Conseil 1</a></li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Conseil 2', '_')) }}">Conseil 2</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Conseil 3', '_')) }}">Conseil 3</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-post-categories', Str::slug("Vendre", '_'))}}">
                                Voir tous les conseils
                            </a>
                        </li>
                        @foreach($posts->where('category_id', 4)->take(3)->all() as $post)
                            <li class="pushy-link">
                                <a href="{{route('see-post', $post->slug)}}">{{$post->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button>Confier</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Le mandat de gestion locative', '_'))}}">
                                Le mandat de gestion locative
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Le mandat de location', '_'))}}">
                                Le mandat de location
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Le mandat de location saisonnière', '_'))}}">
                                mandat de location saisonnière
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Travaux/Réfections', '_'))}}">Travaux/Réfections</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Estimer en ligne le loyer de votre bien', '_'))}}">Prendre rendez-vous</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Estimer en agence le loyer de votre bien', '_'))}}">
                                Estimer en agence le loyer de votre bien
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-post', Str::slug('Pourquoi estimer avant de vendre ?', '_'))}}">
                                Pourquoi estimer avant de vendre ?
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-post', Str::slug("Comprendre l'estimation immobilière", '_'))}}">
                                Comprendre l'estimation
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-post-categories', Str::slug("Faire gérer", '_'))}}">
                                Voir tous les conseils
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button aria-label="Meubler">Meubler</button>
                    <ul>
                        <li class="pushy-link"><a href="{{route('see-page', Str::slug('Nos projets', '_'))}}">Nos projets</a></li>
                        <li class="pushy-link"><a href="{{route('create-meeting')}}">Prendre rendez-vous</a></li>
                        <li class="pushy-link"><a href="{{route('see-page', Str::slug('Décoration intérieure', '_'))}}">Décoration intérieure</a></li>
                        <li class="pushy-link"><a href="{{route('catalogues')}}">Packs ammeublement</a></li>
                        <li class="pushy-link"><a href="{{route('see-page', Str::slug('Home staging', '_'))}}">Home staging</a></li>
                        @foreach($posts->where('category_id', 6)->take(3)->all() as $post)
                            <li class="pushy-link"><a href="{{route('see-post', $post->slug)}}">{{$post->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="pushy-menu">
                    <a href="#">
                        Immobilier Pro
                    </a>
                </li>
                <li class="pushy-menu">
                    <a href="{{$configuration->customer_space_url}}" target="_blank">
                        Espace Clients
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
