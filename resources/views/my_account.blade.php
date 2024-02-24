@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
    <section class="gradient-custom-2 py-3 long-height">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="rounded-0 text-white d-flex flex-row" style="background-color: var(--immopurple);
                        height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="{{asset('images/profile_placeholder.jpeg')}}"
                                     alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2 rounded-0"
                                     style="width: 150px; z-index: 1">
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{$user->full_name}}</h5>
                                <p>{{$user->email}}</p>
                                <p>{{$user->phone_number}}</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div class="px-3">
                                    <p class="mb-1 h5">{{$user->favorite_properties->count()}}</p>
                                    <p class="small text-muted mb-0">{{__('front.favoris_properties')}}</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5">{{$user->alerts->count()}}</p>
                                    <p class="small text-muted mb-0">{{__('front.nbr_alert_created')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black container position-relative">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">{{__('front.favoris_properties')}}</p>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button aria-label="presentation" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">{{__('front.favoris_properties')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button aria-label="Profile" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                                </li>
                            </ul>
                            <div class="tab-content justify-content-center prop-vignettes-wrapper" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="row">
                                        @foreach($properties as $key => $property)
                                            <livewire:property-vignette :property="$property"/>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <div class="row">
                                        @foreach($user->alerts as $key => $alert)
                                        <livewire:alert-vignette :alert="$alert">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
