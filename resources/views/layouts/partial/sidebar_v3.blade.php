<?php
use Illuminate\Support\Facades\Route;
use App\Models\Page;

$route = Route::current();

$name = $route->getName();
$homeStaging = Page::where('slug', 'home_staging')->select('id', 'name', 'slug')->first();
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{route('backoffice')}}" class="nav-link">
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-normal mb-2">
                    @auth
                        {{ auth()->user()->firstname }} {{ auth()->user()->name }}
                    @endauth
                </span>
            </div>
            <i class="mdi mdi-bookmark-check text-primary nav-profile-badge"></i>
            </a>
        </li>

        <li class="nav-item position-relative">
            <a class="nav-link root-nav" data-bs-toggle="collapse" href="#gest-biens" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Gest. Biens</span>
                <i class="mdi mdi-chevron-down"></i>
                <i class="mdi mdi-home-city menu-icon"></i>
            </a>
            <div class="collapse show" id="gest-biens">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">
                            <i class="mdi mdi-folder-home"></i> Gest. Biens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-list-box"></i> Gest. Catégories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link">
                            <i class="mdi mdi-sitemap"></i> Gest. Commodités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link">
                            <i class="mdi mdi-sitemap-outline"></i> Gest. types de biens
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item position-relative">
            <a class="nav-link root-nav" href="#">
                <span class="menu-title">Articles</span>
                <i class="mdi mdi-post menu-icon"></i>
            </a>
        </li>

        <li class="nav-item position-relative">
            <a class="nav-link root-nav" data-bs-toggle="collapse" href="#get-prog" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Programmes</span>
                <i class="mdi mdi-chevron-down"></i>
                <i class="mdi mdi-progress-pencil menu-icon"></i>
            </a>
            <div class="collapse show" id="get-prog">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-star-box"></i> Gest. des programmes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-list-ol mr-2 text-sm text-blueGray-300"></i> Gest. Catégories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link">
                            <i class="mdi mdi-sitemap"></i> Home staging
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item position-relative">
            <a class="nav-link root-nav" href="#">
                <span class="menu-title">Alerts</span>
                <i class="mdi mdi-bell-badge menu-icon"></i>
            </a>
        </li>

        <li class="nav-item position-relative">
            <a class="nav-link root-nav" href="#">
                <span class="menu-title">Estimations</span>
                <i class="mdi mdi-calculator menu-icon"></i>
            </a>
        </li>

        <li class="nav-item position-relative">
            <a class="nav-link root-nav" href="#">
                <span class="menu-title">Pages</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item position-relative">
            <a class="nav-link root-nav" data-bs-toggle="collapse" href="#configurations" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Configurations</span>
                <i class="mdi mdi-chevron-down"></i>
                <i class="mdi mdi-progress-pencil menu-icon"></i>
            </a>
            <div class="collapse show" id="configurations">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-cog-outline"></i> Configurations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-account-group"></i> Configurations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-tag-search"></i> Gest. des metas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-map-marker"></i> Gest. Villes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-map-marker-circle"></i> Gest. Localisations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link">
                            <i class="mdi mdi-office-building"></i> Gest. Agences
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                           class="nav-link">
                            <i class="mdi mdi-server"></i> Gest. Services
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
