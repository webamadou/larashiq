@extends('layouts.tw_admin_v2')

@section('content')
    <a href="{{route('bo.properties.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-arrow-circle-left"></i> {{ __('common_terms.backToList') }}</a>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div id="generalInfoWrapper" class="w-full md:w-3/12 md:mx-2">
                <!-- image Card -->
                <div class="bg-white p-3 border-t-4 border-immopurple">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                             src="{{asset($property->getDefaultImage())}}"
                             alt="">
                        <ul>
                            <li class="py-2 pl-3 text-xs hover:bg-immogray1">
                                <a href="{{route('bo.property_images.create', $property)}}" class="btn">
                                    <i class="fa fa-image"></i> Gestion des images
                                </a>
                            </li>
                            <li class="py-2 pl-3 text-xs hover:bg-immogray1">
                                <a href="{{route('bo.properties.edit', $property)}}" class="btn">
                                    <i class="fa fa-pencil"></i> Editer
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Right Side -->
            <div id="detailsWrapper" class="w-full md:w-9/12 md:mx-2">
                <h1 class="text-2xl">{{$property->name}}</h1>
                <ul>
                    <li><i class="fa fa-user"></i> {{$property?->theOwner?->fullName}}</li>
                    <li><i class="fa fa-list"></i> {{$property?->propertyType?->name}}</li>
                    <li class="ml-1"> - </li>
                    <li><i class="fa fa-map-pin"></i> {{$property?->city?->name}} - {{$property?->country?->name}}</li>
                    <li><i class="fa fa-list-alt"></i> {{$property?->locationType?->name}}</li>
                    <li><i class="fa fa-circle"></i> {{$property?->availability?->name}}</li>
                </ul>
                <h3 class="mt-5 text-2xl text-immopurple">
                    {{ number_format($property->base_price, 2, ',', '.') }} F CFA
                </h3>
            </div>
        </div>
        <div class="md:flex no-wrap md:mx-2">
            <div id="detailsWrapper" class="w-full md:mx-2">
                <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tabFill"
                    role="tablist">
                    <li class="nav-item flex-auto text-center" role="presentation">
                        <a href="#tabs-general" class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active " id="tabs-home-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-general" role="tab"
                           aria-controls="tabs-general" aria-selected="true">{{__('properties.step_general')}}</a>
                    </li>
                    <li class="nav-item flex-auto text-center" role="presentation">
                        <a href="#tabs-step_renting" class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent " id="tabs-profile-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step_renting" role="tab"
                           aria-controls="tabs-step_renting" aria-selected="false">{{__('properties.step_renting')}}</a>
                    </li>
                    <li class="nav-item flex-auto text-center" role="presentation">
                        <a href="#tabs-step_address" class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent " id="tabs-messages-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step_address" role="tab"
                           aria-controls="tabs-step_address" aria-selected="false">{{__('properties.step_address')
                           }}</a>
                    </li>
                    <li class="nav-item flex-auto text-center" role="presentation">
                        <a href="#tabs-step_rooms" class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent " id="tabs-messages-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step_rooms" role="tab"
                           aria-controls="tabs-step_rooms" aria-selected="false">{{__('properties.step_rooms')
                           }}</a>
                    </li>
                    <li class="nav-item flex-auto text-center" role="presentation">
                        <a href="#tabs-step_equipments" class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent " id="tabs-messages-tabFill" data-bs-toggle="pill" data-bs-target="#tabs-step_equipments" role="tab"
                           aria-controls="tabs-step_equipments" aria-selected="false">{{__('properties.step_equipments')
                           }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="tabs-tabContentFill">
                    <div class="tab-pane fade show active" id="tabs-general" role="tabpanel" aria-labelledby="tabs-home-tabFill">
                        <div><strong class="font-bold">{{__('properties.owner')}}</strong>: {{$property->theOwner?->fullName}}</div>
                        <div><strong class="font-bold">{{__('properties.property_type')}} </strong>: {{$property->propertyType?->name}}</div>
                        <div><strong class="font-bold">{!! __('properties.total_surfaces') !!}</strong>: {{$property->total_surfaces}}</div>
                        <div><strong class="font-bold">{{__('properties.location_type') }}</strong>: {{$property->locationType?->name}}</div>
                        <div><strong class="font-bold">{{__('properties.status') }} </strong>: {{$property->statut}}</div>
                        <div class="my-5 color-immogray2"><hr></div>
                        <div class="my-3">{!! $property->description !!}</div>
                    </div><!-- END STEP GENERAL -->
                    <div class="tab-pane fade" id="tabs-step_renting" role="tabpanel" aria-labelledby="tabs-profile-tabFill">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-3xl">
                                    <tbody>
                                    <tr class="bg-gray-100 border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.base_price')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{ number_format($property->base_price, 2, ',', '.') }} F CFA</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.commission_percentage')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple
                                            ">{{$property->commission_percentage}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.montant_syndic')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->montant_syndic}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.deposit_percentage')
                                            }}</strong>:
                                            <span class="text-2xl font-thin text-immopurple">{{$property->deposit_percentage}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.vta_rate')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->vta_rate}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.property_tax')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->property_tax}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.tom_tax_rate')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->tom_tax_rate}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.additional_charges')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->additional_charges}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.tlv_tax_rate')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->tlv_tax_rate}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.generate_total_cost')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->generate_total_cost}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.commission_rate')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->commission_rate}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- END STEP RENTING -->
                    <div class="tab-pane fade" id="tabs-step_address" role="tabpanel" aria-labelledby="tabs-profile-tabFill">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-3xl">
                                    <tbody>
                                    <tr class="bg-gray-100 border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">Pays</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property?->country->name}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.city_libelle')}}</strong>:
                                            <span class="text-2xl font-thin
                                            text-immopurple">{{$property?->localisation?->name}}</span>
                                            <span class="text-2xl font-thin  text-immopurple">{{$property?->city?->name}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" colspan="2">
                                            <strong class="font-bold">{{__('properties.street')
                                            }}</strong>:
                                            <span class="text-2xl font-thin text-immopurple">{{$property->street}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.zone')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->zone}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.stage')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->stage}}</span>
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.apartment_number')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->apartment_number}}</span>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <strong class="font-bold">{{__('properties.position')}}</strong>:
                                            <span class="text-2xl font-thin  text-immopurple">{{$property->position}}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- END TAB ADDRESS -->
                    <div class="tab-pane fade" id="tabs-step_rooms" role="tabpanel" aria-labelledby="tabs-profile-tabFill">
                        <table class="min-w-full text-3xl">
                            <tbody>
                            <tr class="bg-gray-100 border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <strong class="font-bold">{{__('properties.nbr_rooms')}}</strong>:
                                    <span class="text-2xl font-thin  text-immopurple">{{$property->nbr_rooms}}</span>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <strong class="font-bold">{{__('properties.nbr_lounge_rooms')}}</strong>:
                                    <span class="text-2xl font-thin  text-immopurple
                                            ">{{$property?->nbr_lounge_rooms}}</span>
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <strong class="font-bold">{{__('properties.nbr_bedrooms')}}</strong>:
                                    <span class="text-2xl font-thin  text-immopurple">{{$property->nbr_bedrooms}}</span>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <strong class="font-bold">{{__('properties.nbr_kitchens')}}</strong>:
                                    <span class="text-2xl font-thin  text-immopurple">{{$property->nbr_kitchens}}</span>
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" colspan="2">
                                    <strong class="font-bold">{{__('properties.nbr_showerrooms')
                                            }}</strong>:
                                    <span class="text-2xl font-thin text-immopurple">{{$property->nbr_showerrooms}}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- END TAB ROOMS -->
                    <div class="tab-pane fade" id="tabs-step_equipments" role="tabpanel" aria-labelledby="tabs-profile-tabFill">
                        <div class="flex justify-center">
                            <ul class="bg-white rounded-lg w-96 text-gray-900">
                                @foreach($property->commodities as $commodity)
                                    <li class="px-6 py-2 border-b border-gray-200 w-full text-immopurple">
                                        {{$commodity->name}}<i class="fa fa-check text-green-800 ml-6"></i>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- END TAB EQUIPMENT -->
                </div>
            </div>
        </div>
    </div>
@endsection
