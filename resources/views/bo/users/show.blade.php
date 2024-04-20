@extends('layouts.admin_v3')

@section('content')
    <section class="h-100 gradient-custom-2">
        <a href="{{route('bo.users.index')}}" class="btn btn-success">
            <i class="mdi mdi-chevron-left"></i> Retour à la liste
        </a>
        <div class="container py-0 h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                    <div class="rounded-top text-white d-flex flex-row bg-linkedin" style="height:200px;">
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                        <img src="{{asset('images/profile_placeholder.jpeg')}}"
                            alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                            style="width: 150px; z-index: 1">
                        <form action="" style="z-index: 1" action="{{ route('bo.users.destroy',$user) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('bo.users.edit', $user) }}" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary" data-mdb-ripple-color="dark">
                                <i class="mdi mdi-pencil-box-outline"></i> Editer</button>
                            </a>
                        </form>
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                        <h5>{{$user->fullName}}</h5>
                        <p>{{$user->getRoleNames()->implode(',')}}</p>
                        </div>
                    </div>
                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                        <div class="d-flex justify-content-end text-center py-1">
                        <div>
                            <p class="mb-1 h5">-</p>
                            <p class="small text-muted mb-0">-</p>
                        </div>
                        <div class="px-3">
                            <p class="mb-1 h5">-</p>
                            <p class="small text-muted mb-0">-</p>
                        </div>
                        <div>
                            <p class="mb-1 h5">-</p>
                            <p class="small text-muted mb-0">-</p>
                        </div>
                        </div>
                    </div>
                    <div class="card-body p-4 text-black">
                        <div class="mb-5">
                        <h2 class="lead fw-normal mb-1">Infos du profil</h2>
                        <div class="p-4" style="background-color: #f8f9fa;">
                            <div class="px-4 py-2">
                                <b>Prénom : </b>{{$user->first_name}}
                            </div>
                            <div class="px-4 py-2">
                                <b>Nom : </b>{{$user->name}}
                            </div>
                            <div class="px-4 py-2">
                                <b>Genre : </b> {!! $user->displayGender !!}
                            </div>
                            <div class="px-4 py-2">
                                <b>N° téléphone : </b>{{$user->phone_number}}
                            </div>
                            <div class="px-4 py-2">
                                <b>Adresse
                                        actuelle : </b>{{$user->address}}
                            </div>
                            <div class="px-4 py-2">
                                <b>Email : </b>{{$user->email}}
                            </div>
                            <div class="px-4 py-2">
                                <b>Date de naissance : </b>{{$user->birth_date}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
