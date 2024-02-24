<div class="bg-immogray2 w-2/12 mt-5" id="sidenavSecExample">
    <div class="pt-4 pb-2 px-6">
        <a href="#!">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="{{ asset('images/profile_placeholder.jpeg') }}" alt="mdo" width="32"
                         height="32" class="rounded-circle rounded-full">
                </div>
                <div class="grow ml-3">
                    <p class="text-sm font-semibold text-blue-600">
                        @auth
                            {{ auth()->user()->firstname }} {{ auth()->user()->name }}
                        @endauth
                    </p>
                </div>
            </div>
        </a>
    </div>
    <hr class="my-2 border-immogray1">
    @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::SUPER_PUBLISHER.'|'.RoleModel::PUBLISHER)
        <ul class="relative">
            <li class="relative">
                <a
                    class="flex items-center text-lg py-4 px-6 overflow-hidden text-slate-700 text-ellipsis whitespace-nowrap hover:text-slate-600 hover:bg-slate-50 transition duration-300 ease-in-out bg-white"
                    href="{{url('admin')}}"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="secondary"
                >
                    <span><i class="fa fa-dashboard"></i> Tableau de bord</span>
                </a>
            </li>
            <li class="relative" id="sidenavSecEx2">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple">
                    <i class="fa fa-home"></i>
                    <span> &nbsp; Gest. des biens</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                    </svg>
                </a>
                <ul class="relative">
                    <li class="relative">
                        <a
                            href="{{route('bo.properties.index')}}"
                           class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary">Gestion des biens</a>
                    </li>
                    <li class="relative">
                        <a href="{{route('bo.categories.index')}}" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap" data-mdb-ripple="true" data-mdb-ripple-color="primary">Gestion des catégories</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('bo.commodities.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des commodités</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('bo.property_types.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion types de biens</a>
                    </li>
                </ul>
            </li>
        </ul>
    @endhasanyrole
    @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::SUPER_PUBLISHER)
        <ul class="relative">
            <li class="relative" id="sidenavSecEx2">
                <a href="{{route('bo.alerts.index')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple border-b-2 border-b-immopurple">
                    <i class="fa fa-bell"></i>
                    <span> &nbsp; Gest. des alertes</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                </a>
            </li>
        </ul>
        <ul class="relative">
            <li class="relative" id="gest_estimation">
                <a href="{{route('bo.estimations.index')}}"
                   class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple border-b-2 border-b-immopurple">
                    <i class="fa fa-money"></i>
                    <span> &nbsp; Gest. des estimations</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                </a>
            </li>
        </ul>
    @endhasanyrole
    <ul class="relative">
        @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::EDITOR)
            <li class="relative" id="sidenavXxEx2">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple" data-mdb-ripple="true"
                   data-mdb-ripple-color="primary" data-bs-toggle="collapse" data-bs-target="#collapseSidenavXxEx2" aria-expanded="false" aria-controls="collapseSidenavXxEx2">
                    <i class="fa fa-cog"></i>
                    <span>&nbsp; Gest. Page & Menu</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                    </svg>
                </a>
                <ul class="relative">
                    <li class="relative">
                        <a
                            href="{{route('bo.pages.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des pages</a>
                    </li>
                    <!-- <li class="relative">
                        <a
                            href="{ {route('bo.menus.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des menus</a>
                    </li> -->
                </ul>
            </li>
        @endhasanyrole

        @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::EDITOR)
            <li class="relative" id="sidenavXxEx2">
                <a href="{{route('bo.posts.index')}}"
                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                    whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple" data-mdb-ripple="true"
                    data-mdb-ripple-color="primary" data-bs-toggle="collapse" data-bs-target="#collapseSidenavXxEx2" aria-expanded="false" aria-controls="collapseSidenavXxEx2">
                    <i class="fa fa-file"></i>
                    <span>&nbsp; Gest. Articles</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                    </svg>
                </a>
                <ul class="relative">
                    <li class="relative">
                        <a
                            href="{{route('bo.posts.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des articles</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('bo.post_categories.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des categories</a>
                    </li>
                </ul>
            </li>
        @endhasanyrole
        @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN.'|'.RoleModel::SUPER_PUBLISHER.'|'.RoleModel::PUBLISHER)
            <li class="relative" id="sidenavXxEx3">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple" data-mdb-ripple="true"
                   data-mdb-ripple-color="primary" data-bs-toggle="collapse" data-bs-target="#collapseSidenavXxEx3" aria-expanded="false" aria-controls="collapseSidenavXxEx3">
                    <i class="fa fa-users"></i>
                    <span>&nbsp; Profils utilisateurs</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                    </svg>
                </a>
                <ul class="relative">
                    <li class="relative">
                        <a
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            href="{{route('bo.users.index')}}"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="secondary"
                        >
                            <span><i class="fa fa-users"></i> Gestion des profils</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endhasanyrole
        @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN)
            <li class="relative" id="sidenavXxEx2">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple" data-mdb-ripple="true"
                   data-mdb-ripple-color="primary" data-bs-toggle="collapse" data-bs-target="#collapseSidenavXxEx2" aria-expanded="false" aria-controls="collapseSidenavXxEx2">
                    <i class="fa fa-cog"></i>
                    <span>&nbsp; SEO</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                    </svg>
                </a>
                <ul class="relative">
                    <li class="relative">
                        <a
                            href="{{route('bo.metas.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des metas tags</a>
                    </li>
                </ul>
            </li>
        @endhasanyrole
        @hasanyrole(RoleModel::SUPER_ADMIN.'|'.RoleModel::ADMIN)
            <li class="relative" id="sidenavXxEx2">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis
                whitespace-nowrap cursor-pointer border-b-2 border-b-immopurple" data-mdb-ripple="true"
                   data-mdb-ripple-color="primary" data-bs-toggle="collapse" data-bs-target="#collapseSidenavXxEx2" aria-expanded="false" aria-controls="collapseSidenavXxEx2">
                    <i class="fa fa-cog"></i>
                    <span>&nbsp; Configurations</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><i class="fa fa-chevron-right text-immopurplelight"></i>
                    </svg>
                </a>
                <ul class="relative">
                    <li class="relative">
                        <a
                            href="{{route('bo.services.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des services</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('bo.poles.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                                >Gestion des pôles</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('bo.cities.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des villes</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('bo.localisations.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des localisations</a>
                    </li>
                    <li class="relative">
                        <a
                            href="{{route('bo.agencies.index')}}"
                            class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="primary"
                        >Gestion des agences</a>
                    </li>
                </ul>
            </li>
        @endhasanyrole
    </ul>
</div>
