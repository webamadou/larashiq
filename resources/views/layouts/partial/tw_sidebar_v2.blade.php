<?php
use Illuminate\Support\Facades\Route;
use App\Models\Page;

$route = Route::current();

$name = $route->getName();
$homeStaging = Page::where('slug', 'home_staging')->select('id', 'name', 'slug')->first();
?>
<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="{{route('backoffice')}}"
           data-target="backoffice">
            <img src="{{ asset('images/logo.png')}}" alt="{{config('app.name', 'Immoplus')}}">
            @auth
                {{ auth()->user()->firstname }} {{ auth()->user()->name }}
            @endauth
        </a>
        <span id="current-route" data-target="{{Route::currentRouteName()}}"></span>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar">
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::SUPER_PUBLISHER.'|'.RoleModel::PUBLISHER)
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <span><i class="fa fa-dashboard"></i> Tableau de bord</span>
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{route('bo.properties.index')}}"
                       data-target="properties" data-position="5"
                        class="text-xs uppercase py-3 font-bold block active hover:text-purple-700">
                        <i class="fa fa-list mr-2 text-sm text-blueGray-300"></i> Gest. Biens
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{route('bo.categories.index')}}"
                       data-target="categories" data-position="10"
                        class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fa fa-list-ol mr-2 text-sm text-blueGray-300"></i>
                        Gest. Catégories
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{route('bo.commodities.index')}}"
                       data-target="commodities" data-position="15"
                        class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fa fa-list-ol mr-2 text-sm text-blueGray-300"></i>
                        Gest. Commodités
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{route('bo.property_types.index')}}"
                       data-target="property_types" data-position="20"
                        class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                        <i class="fa fa-list-ol mr-2 text-sm text-blueGray-300"></i>
                        Gest. types de biens
                    </a>
                </li>
            </ul>

            @endhasanyrole
            @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::SUPER_PUBLISHER)
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-star"></i> Programmes
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{route('bo.programs.index')}}"
                       data-target="programs" data-position="35"
                        class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fa fa-star text-blueGray-300 mr-2 text-sm"></i>
                        Gest. des programmes
                    </a>
                </li>
                <li class="inline-flex">
                    <a href="{{route('bo.catalogues.index')}}"
                       data-target="catalogues" data-position="35"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-list-alt mr-2 text-blueGray-300 text-base"></i>
                        Gest. Catalogues
                    </a>
                </li>
                <li class="inline-flex">
                    <a href="{{route('bo.pages.edit', $homeStaging->id)}}"
                       data-target="home-staging" data-position="35"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-book mr-2 text-blueGray-300 text-base"></i>
                        Home staging
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-bell"></i> Alerts
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{route('bo.alerts.index')}}"
                       data-target="alerts" data-position="25"
                        class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fa fa-bell-o text-blueGray-300 mr-2 text-sm"></i>
                        Gest. des alertes
                    </a>
                </li>
            </ul>
            @endhasanyrole
            @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::SUPER_PUBLISHER)
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-calculator"></i> Estimations
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{route('bo.estimations.index')}}"
                       data-target="estimations" data-position="30"
                        class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fa fa-calculator text-blueGray-300 mr-2 text-sm"></i>
                        Gest. des Estimations
                    </a>
                </li>
            </ul>
            @endhasanyrole
            @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::EDITOR)
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-list"></i> Pages
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{route('bo.pages.index')}}"
                       data-target="pages" data-position="35"
                        class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fa fa-angle-right text-blueGray-300 mr-2 text-sm"></i>
                        Pages
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-newspaper-o"></i> Articles
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="inline-flex">
                    <a href="{{route('bo.posts.index')}}"
                       data-target="posts" data-position="40"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i
                            class="fa fa-newspaper-o mr-2 text-blueGray-300 text-base"
                        ></i>
                        Gest. Articles
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="{{route('bo.post_categories.index')}}"
                       data-target="post_categories" data-position="45"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-list-alt mr-2 text-blueGray-300 text-base"></i>
                        Articles Categories
                    </a>
                </li>
            </ul>
            @endhasanyrole
            @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN)
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-user-circle"></i> Profils
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="inline-flex">
                    <a href="{{route('bo.users.index')}}"
                       data-target="users" data-position="50"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-user-circle-o mr-2 text-blueGray-300 text-base"></i>
                        Gest. Profils
                    </a>
                </li>
            </ul>
            @endhasanyrole
            @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN)
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-code"></i> SEO
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="inline-flex">
                    <a href="{{route('bo.metas.index')}}"
                       data-target="metas" data-position="100"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-code mr-2 text-blueGray-300 text-base"></i>
                        Gest. des metas
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                <i class="fa fa-user-circle"></i> Configurations
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="inline-flex">
                    <a href="{{route('bo.configurations.index')}}"
                       data-target="configurations" data-position="100"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-cogs mr-2 text-blueGray-300 text-base"></i>
                        Configurations
                    </a>
                </li>
                <li class="inline-flex">
                    <a href="{{route('bo.cities.index')}}"
                       data-target="cities" data-position="100"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-map mr-2 text-blueGray-300 text-base"></i>
                        Gest. Villes
                    </a>
                </li>
                <li class="inline-flex">
                    <a href="{{route('bo.localisations.index')}}"
                       data-target="localisations" data-position="100"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-map-pin mr-2 text-blueGray-300 text-base"></i>
                        Gest. Localisations
                    </a>
                </li>
                <li class="inline-flex">
                    <a href="{{route('bo.agencies.index')}}"
                       data-target="agencies" data-position="100"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-home mr-2 text-blueGray-300 text-base"></i>
                        Gest. Agences
                    </a>
                </li>
                <li class="inline-flex">
                    <a href="{{route('bo.services.index')}}"
                       data-target="services" data-position="100"
                        class="text-blueGray-700 hover:text-blueGray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fa fa-server mr-2 text-blueGray-300 text-base"></i>
                        Gest. Services
                    </a>
                </li>
            </ul>
            @endhasanyrole
        </div>
    </div>
</nav>
