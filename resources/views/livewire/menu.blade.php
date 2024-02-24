<div>
    <div>
        @if (session()->has('success'))
            <div class="alert bg-green-100 py-1 px-6 mb-3 text-base font-normal text-green-700 inline-flex items-center
            w-full alert-dismissible fade show"
                 role="alert">
                <strong class="mr-1 ">{{ session('success') }} </strong>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none
                rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900
                hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="w-full px-6 py-4 {{$menuItemForm ? 'show' : 'hidden'}}" id="nynamicFormWrapper">
        <h1>{{$menuItem?->id ? "Modification du lien $menuItem->name" : "Nouveau lien"}}</h1>
        <form method="post" id="storeMenuItem" action="{{$menuItemFormAction}}">
            @csrf
            @if(isset($menuItem->id))
                @method('PUT')
            @endif
            @include('bo.menu_items.air_form')
        </form>
    </div>
    <div class="w-full px-6 py-4 {{$menuForm ? 'show' : 'hidden'}}" id="menuFormWrapper">
        <form method="post" id="storeMenu" action="{{$menuFormAction}}">
            @csrf
            @if(isset($menu->id))
                @method('PUT')
            @endif
            @include('bo.menus.air_form')
        </form>
    </div>
    <div class="w-full px-6 py-4" x-data="confirmationModal()">
        <ul class=" nav nav-tabs nav-justified flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4 " id="tabs-tabJustify" role="tablist">
            @foreach($menuTypes as $key => $name)
                <li class="nav-item flex-grow text-center" role="presentation">
                    <a href="#{{'tab-'.$key}}"
                       class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0
                       border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100
                       focus:border-transparent {{session('menuTab') == $key ? 'active' : ''}} "
                       id="tabs-home-tabJustify"
                       data-bs-toggle="pill"
                       data-bs-target="#{{'tab-'.$key}}"
                       role="tab"
                       aria-controls="{{'tab-'.$key}}"
                       wire:click.prevent="setDefaultTab({{$key}})"
                    >{{$name}}
                        <button
                            class="inline-block ml-5 px-1 py-1 bg-green-600 text-white font-light text-xs
                            leading-tight" title="Ajouter un menu {{$name}}"
                            wire:click="addMenu({{$key}})" style="line-height: 1" aria-label="Plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="tabs-tabContentJustify">
            @foreach($menuTypes as $key => $name)
                <div class="tab-pane fade show  {{session('menuTab') == $key ? 'active' : ''}} " id="{{'tab-'.$key}}" role="tabpanel"
                     aria-labelledby="tabs-home-tabJustify">
                    <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                        id="inner-tabs-{{$key}}"
                        role="tablist">
                        @foreach($menus->where('menu_position', $key) as $id => $menu)
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-{{$menu->slug}}"
                                   class=" nav-link block font-light text-1xl bg-immogray1 leading-tight uppercase
                                   border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2
                                   hover:border-transparent hover:bg-gray-100 focus:border-transparent
                                   {{session('menuInnerTab') == $id ? 'active' : ''}} "
                                   id="tabs-{{$menu->slug}}-tab"
                                   data-bs-toggle="pill"
                                   data-bs-target="#tabs-{{$menu->slug}}"
                                   role="tab"
                                   aria-controls="tabs-{{$menu->slug}}"
                                   aria-selected="true"
                                   wire:click="setDefaultInnerTab({{$id}})"
                                >{{$menu->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="inner-tabs-{{$key}}-content">
                        @foreach($menus->where('menu_position', $key) as $id => $menu)
                            <div class="tab-pane fade show {{session('menuInnerTab') == $id ? 'active' : ''}}"
                                 id="tabs-{{$menu->slug}}"
                                 role="tabpanel"
                                 aria-labelledby="tabs-{{$menu->slug}}-tab">
                                <div class="flex">
                                    <button type="button" class="inline-block my-2 ml-5 px-1 py-1 bg-blue-600 text-white
                                    font-light text-xs
                            leading-tight"
                                            wire:click="addMenuItem({{$menu->id}})"
                                            aria-label="Ajouter un lien dans [ {{$menu->name}} ]"
                                    >
                                        <i class="fa fa-plus"></i> Ajouter un lien dans [ {{$menu->name}} ]
                                    </button>
                                    <button class="inline-block my-2 ml-5 px-1 py-1 bg-red-600 text-white font-light text-xs leading-tight"
                                            title="Supprimer le menu {{$menu->name}}"
                                            wire:click="deleteMenu({{$menu->id}})" style="line-height: 1"
                                            aria-label="Ajouter un lien dans [ {{$menu->name}} ]">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <div class="flex flex-row justify-start">
                                    @foreach(range(1, 3) as $column)
                                        <div class="flex justify-center justify-content-between">
                                            <ul class="bg-white border-none border-immopurple w-96 text-gray-900 px-1">
                                                <div class="basis-1/4 md:basis-1/3" drag-root>
                                                    @foreach($menu->menuItems->where('column', $column)->sortBy ('position') as $item)
                                                        <li drag-item draggable="true"
                                                            data-position="{{$item->position}}"
                                                            data-id="{{$item->id}}"
                                                            dragging="false"
                                                            class="px-6 py-2 border-2 border-immogray2 w-full flex
                                                            justify-between">
                                                            <div class="text-sm">
                                                                <i class="fa fa-bars text-immopurple text-xs pr-3
                                                            cursor-pointer"></i>
                                                                {{$item->name}}
                                                            </div>
                                                            <div>
                                                                <button class="inline-block px-1 py-1 bg-white
                                                                text-blue-400
                                                                 font-medium text-xs leading-tight"
                                                                   wire:click.prevent="editMenuItem({{$item->id}})"
                                                                   aria-label="Editer">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                                <button class="ml-1" type="button"
                                                                        wire:click.prevent="deleteMenuItem({{$item->id}})"
                                                                        aria-label="Supprimer">
                                                                    <i class="fa fa-trash text-red-400"></i>
                                                                </button>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
