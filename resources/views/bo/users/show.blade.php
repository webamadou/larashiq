@extends('layouts.tw_admin_v2')

@section('content')
    <a href="{{route('bo.users.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none
       shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none
       focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste</a>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-immopurple">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                             src="{{asset('images/profile_placeholder.jpeg')}}"
                             alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->fullName}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{'Roles'}}</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                        {{$user->getRoleNames()->implode(',')}}
                    </p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Statut</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 text-white text-sm">Active</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span> - </span>
                            <span class="ml-auto">Inscrit {{$user->memberSince}}</span>
                        </li>
                        <li>
                            <form action="{{ route('bo.users.destroy',$user) }}" method="Post"  class="flex items-center py-3">
                                @csrf
                                @method('DELETE')
                                <span> <a href="{{route('bo.users.edit', $user)}}">
                                        <i class="fa fa-pencil"></i> Editer</a></span>
                                <span class="ml-auto">
                                    <button type="submit" class="text-red-600" aria-label="Supprimer">
                                        <i class="fa fa-trash"></i> Supprimer</button>
                                </span>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <i class="fa fa-info-circle text-immopurple fa-2x"></i>
                        </span>
                        <span class="tracking-wide text-immopurple">Infos du profil</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2 bg-immogray1">
                                <div class="px-4 py-2"><span class="font-semibold
                                pr-4">Prénom:</span>{{$user->first_name}}</div>
                            </div>
                            <div class="grid grid-cols-2 items-start bg-immogray1">
                                <div class="px-4 py-2"><span class="font-semibold pr-4">Nom:</span>{{$user->name}}</div>
                            </div>
                            <div class="grid grid-cols-2 bg-white">
                                <div class="px-4 py-2"><span class="font-semibold pr-4">Genre:</span>
                                    {!! $user->displayGender !!}</div>
                            </div>
                            <div class="grid grid-cols-2 bg-white">
                                <div class="px-4 py-2"><span class="font-semibold pr-4">N° téléphone:</span>{{$user->phone_number}}</div>
                            </div>
                            <div class="grid grid-cols-2 bg-immogray2">
                                <div class="px-4 py-2"><span class="font-semibold pr-4">Adresse
                                        actuelle:</span>{{$user->address}}</div>
                            </div>
                            <div class="grid grid-cols-2 bg-immogray2">
                                <div class="px-4 py-2"><span class="font-semibold pr-4">Email:</span>{{$user->email}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2"><span class="font-semibold pr-4">
                                        Date de naissance:</span>{{$user->birth_date}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- liste des derniers actions du user -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <h3 class="text-immopurple text-center font-semibold p-3 my-4">Interventions</h3>
                    <div class="">
                        <div class="text-center text-immogray2">Aucune pour le moment</div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
