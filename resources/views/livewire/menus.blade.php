<div>
    <div class="navbar navbar-expand-lg navbar-light shadow-sm py-0 " id="mainNav">
        <div class="container">
            <div class="row immo-grid immo-grid--custom immo-grid--nowrap header-items-wrapper">
                <div class="col-2 logo-wrapper">
                    <span class="">
                        <a class="navbar-brand fw-bold menu-logo" href="{{route('home-page')}}">
                            <!-- set a 168 i.e a 16:9 aspect ratio -->
                            <img src="{{asset('/images/logo-small.png')}}" alt="sabluximmoplus" width="168" height="69.9">
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
                            <li role="menuitem" class="immo-c-nav__item">
                                <a href="#" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.rent')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                    </span>
                                </a>
                                <div id="submenu-rent" class="immo-c-submenu immo-c-nav__submenu w-100 left-0"
                                     aria-label="Sous-menu: Louer">
                                    <div class="immo-grid immo-grid--custom o-grid--none o-grid--1@md o-grid--1@sm">
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
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
                                                            <a href="{{route('acquisition-type-rent', 'villas')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-home-city"></span> Villas</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('rent-professional-props')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-office-building"></span> Immobiliers professionnels</a>
                                                        </li>
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
                                                                <span class="mdi mdi-bell-badge-outline"></span>
                                                                Créer une alerte mail</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-meeting')}}" class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-calendar-check"></span>
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
                                                                ->take(3)
                                                                ->all() as $post)
                                                                <li role="menuitem" class="c-submenu__item">
                                                                    <a href="{{route('see-post', $post->slug)}}"
                                                                       class="c-link c-link--reverse c-submenu__link">
                                                                        <span class="mdi mdi-post-outline"></span>
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
                                <a href="#" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.buy')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                    </span>
                                </a>
                                <div id="submenu-buy" class="immo-c-submenu immo-c-nav__submenu w-100 left-0"
                                     aria-label="Sous-menu:
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
                                                            <a href="{{route('acquisition-type-buy', 'appartements')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-domain"></span> Appartements</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-buy', 'villas')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-home-city"></span> Villas</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-type-buy', 'terrains')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-land-fields"></span> Terrains</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('buy-professional-props')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-office-building"></span> Immobiliers professionnels</a>
                                                        </li>
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
                                                                <span class="mdi mdi-bell-badge-outline"></span>
                                                                Créer une alerte mail</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('create-meeting')}}" class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi
                                                                mdi-calendar-check"></span>
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
                                                                ->take(3)
                                                                ->all() as $post)
                                                                <li role="menuitem" class="c-submenu__item">
                                                                    <a href="{{route('see-post', $post->slug)}}"
                                                                       class="c-link c-link--reverse c-submenu__link">
                                                                        <span class="mdi mdi-post-outline"></span>
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
                                <a href="#" id="submenu-laying_out-trigger" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.laying_out')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                    </span>
                                </a>
                                <div id="submenu-laying_out" class="immo-c-submenu immo-c-nav__submenu left-0"
                                     aria-label="Sous-menu: manage">
                                    <div class="immo-grid immo-grid--custom o-grid--none o-grid--1@md o-grid--1@sm">
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-palette-swatch-outline"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Home staging', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-palette-swatch-variant"></span>
                                                                Home staging
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Décoration intérieure', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-palette-swatch-variant"></span>
                                                                Décoration intérieure
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Décoration professionnelle', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-palette-swatch-variant"></span>
                                                                Décoration professionnelle
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Décoration partie commune', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-palette-swatch-variant"></span>
                                                                Décoration partie commune
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--4 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-notebook-multiple"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        @foreach($posts
                                                        ->where('category_id', 5)
                                                        ->take(2)
                                                        ->all() as $post)
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-post', $post->slug)}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-post-outline"></span>
                                                                {{$post->name}}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('blog')}}"
                                                               class="c-link c-link&#45;&#45;reverse c-submenu__link">
                                                                <span class="mdi mdi-list-box"></span> Blog
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
                                                                    <span class="mdi mdi-post-outline"></span>
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
                                <a href="#" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.manage')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                    </span>
                                </a>
                                <div id="submenu-estimate" class="immo-c-submenu immo-c-nav__submenu w-100 left-0"
                                     aria-label="Sous-menu: manage">
                                    <div class="immo-grid immo-grid--custom o-grid--none o-grid--1@md o-grid--1@sm">
                                        <div class="immo-grid__col o-grid__col--6 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-calculator-variant"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{ route('create-estimation')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-calculator-variant"></span>
                                                                {{ __('front.estimate') }}
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('see-page', Str::slug('Le mandat de gestion', '_'))}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-file-sign"></span>
                                                                Le mandat de gestion
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--6 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-newspaper"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        @foreach($posts->where('category_id', 10)->take(3)->all() as $post)
                                                            <li role="menuitem" class="c-submenu__item">
                                                                <a href="{{route('see-post', $post->slug)}}"
                                                                   class="c-link c-link--reverse c-submenu__link">
                                                                    <span class="mdi mdi-post-outline"></span>
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
                                <a href="#" class="immo-c-nav__link">
                                    <span class="immo-c-nav__text immo-c-nav__text--arrow immo-c-arrow">
                                        <span>{{__('front.immo_pro')}}</span>
                                        <i class="c-icon c-icon--close c-nav__arrow u-text-icon-xxs">
                                            <svg width="13" height="24" viewBox="0 0 11 20" xmlns="http://www.w3.org/2000/svg" class="c-icon__svg" aria-hidden="true"><path d="M.244 19.002a.832.832 0 0 1 0-1.178l8.2-8.2-8.2-8.202A.832.832 0 1 1 1.423.244l8.789 8.79a.832.832 0 0 1 0 1.178l-8.79 8.79a.831.831 0 0 1-1.178 0z"></path></svg>
                                        </i>
                                    </span>
                                </a>
                                <div id="submenu-estimate" class="immo-c-submenu immo-c-nav__submenu w-100 left-0"
                                     aria-label="Sous-menu: manage">
                                    <div class="immo-grid immo-grid--custom o-grid--none o-grid--1@md o-grid--1@sm">
                                        <div class="immo-grid__col o-grid__col--6 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p><span class="mdi mdi-book-open-page-variant"></span></p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{ route('show-program', $program->slug)}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-apple-keyboard-option"></span>
                                                                {{ $program->name }}
                                                            </a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-biens-type', 'plateaux_de_bureau')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-chair-rolling"></span> Plateaux de bureau</a>
                                                        </li>
                                                        <li role="menuitem" class="c-submenu__item">
                                                            <a href="{{route('acquisition-biens-type', 'magasin')}}"
                                                               class="c-link c-link--reverse c-submenu__link">
                                                                <span class="mdi mdi-store"></span> Commerces</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="immo-grid__col o-grid__col--6 c-submenu__col">
                                            <div class="immo-c-submenu__inner">
                                                <div class="c-submenu__content c-submenu__content--header">
                                                    <p>
                                                        <span class="mdi mdi-newspaper"></span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <ul role="menu">
                                                        @foreach($posts->where('category_id', 8)->take(3)->all() as $post)
                                                            <li role="menuitem" class="c-submenu__item">
                                                                <a href="{{route('see-post', $post->slug)}}"
                                                                   class="c-link c-link--reverse c-submenu__link">
                                                                    <span class="mdi mdi-post-outline"></span>
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
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-rent', 'appartements')}}" class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-sofa-outline"></span> Appartements
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('rent-furnished-by-type', 'appartements')}}"
                                class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-table-furniture"></span> Appartements meublés</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-rent', 'villas')}}"
                                       class="c-link c-link--reverse c-submenu__link">
                                       <span class="mdi mdi-home-outline"></span> Villas</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('rent-professional-props')}}"
                                        class="c-link c-link--reverse c-submenu__link">
                                        <span class="mdi mdi-office-building"></span> Immobiliers professionnels</a>
                        </li><li><hr></li>
                        <li class="pushy-link">
                            <a href="{{route('create-alert')}}">
                                <span class="mdi mdi-bell-badge"></span> Créer une alerte mail
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('create-meeting')}}">
                                <span class="mdi mdi-calendar-check"></span> Prendre rendez-vous
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button wire:click.prevent="setMenu('acheter')" aria-label="Acheter">Acheter</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-buy', 'appartements')}}"
                               class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-sofa-outline"></span>  Appartements</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-buy', 'villas')}}"
                               class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-home-outline"></span> Villas</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-type-buy', 'terrains')}}"
                               class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-land-fields"></span> Terrains</a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('buy-professional-props')}}"
                               class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-office-building"></span> Immobiliers professionnels</a>
                        </li><li><hr> </li>
                        <li class="pushy-link">
                            <a href="{{route('create-alert')}}">
                                <span class="mdi mdi-bell-badge"></span> Créer une alerte mail
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('create-meeting')}}">
                                <span class="mdi mdi-calendar-check"></span> Prendre rendez-vous
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button aria-label="Meubler">Meubler</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Home staging', '_'))}}">
                                <span class="mdi mdi-palette-swatch-variant"></span>
                                Home staging
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Décoration intérieure', '_'))}}">
                                <span class="mdi mdi-palette-swatch-variant"></span>
                                Décoration intérieure
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Décoration professionnelle', '_'))}}">
                                <span class="mdi mdi-palette-swatch-variant"></span>
                                Décoration professionnelle
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('see-page', Str::slug('Décoration partie commune', '_'))}}">
                                <span class="mdi mdi-palette-swatch-variant"></span>
                                Décoration partie commune
                            </a>
                        </li>
                        <li><hr></li>
                        @foreach($posts
                            ->where('category_id', 5)
                            ->take(2)
                            ->all() as $post)
                        <li class="pushy-link">
                            <a href="{{route('see-post', $post->slug)}}">
                                <span class="mdi mdi-post-outline"></span>
                                {{$post->name}}
                            </a>
                        </li>
                        @endforeach
                        <li class="pushy-link">
                            <a href="{{route('blog')}}">
                                <span class="mdi mdi-list-box"></span> Blog
                            </a>
                        </li>
                        <!-- <li class="pushy-link">
                            <a href="{{route('blog')}}"
                               class="c-link c-link&#45;&#45;reverse c-submenu__link">
                                <span class="mdi mdi-list-box-outline"></span> Blog
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li class="pushy-submenu pushy-submenu-closed">
                    <button aria-label="{{__('front.immo_pro')}}">Immobilier Pro</button>
                    <ul>
                        <li class="pushy-link">
                            <a href="{{ route('show-program', $program->slug)}}"
                               class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-apple-keyboard-option"></span>
                                {{ $program->name }}
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-biens-type', 'plateaux_de_bureau')}}"
                               class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-office-building"></span> Plateaux de bureau
                            </a>
                        </li>
                        <li class="pushy-link">
                            <a href="{{route('acquisition-biens-type', 'magasin')}}"
                               class="c-link c-link--reverse c-submenu__link">
                                <span class="mdi mdi-store"></span> Commerces</a>
                        </li>
                    </ul>
                </li>
                <li class="pushy-menu">
                    <a href="{{$configuration->customer_space_url}}" target="_blank">
                        &nbsp;Espace Clients <span class="mdi mdi-menu-right"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
