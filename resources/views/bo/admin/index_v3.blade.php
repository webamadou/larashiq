@extends('layouts.admin_v3')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-cog"></i>
        </span> Dashboard
        </h3>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
            <h4 class="font-weight-normal mb-3">Le nbr de quelque chose<i class="mdi mdi-home-analytics mdi-24px float-right"></i>
            </h4>
            <h1 class="mb-5">{{$allBiens->where('acquisition_type', 2)->count()}}</h1>
            <h6 class="card-text">-</h6>
            </div>
        </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
            <h4 class="font-weight-normal mb-3">Nbr d'autre choses <i class="mdi mdi-home-circle mdi-24px float-right"></i>
            </h4>
            <h1 class="mb-5">{{$allBiens->where('acquisition_type', 1)->count()}}</h1>
            <h6 class="card-text">-</h6>
            </div>
        </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
            <h4 class="font-weight-normal mb-3">Alerts <i class="mdi mdi-bell-badge mdi-24px float-right"></i>
            </h4>
            <h1 class="mb-5">{{$totalAlerts}}</h1>
            <h6 class="card-text">-</h6>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body row">
            <div class="col-10"><h4 class="card-title">Dernières demandes d'estimations</h4></div>
            <div class="col-2">
                <a href="#"
                    class="btn btn-gradient-primary btn-sm text-decoration-none"
                    type="button">
                    Voir la liste
                </a>
            </div>
            <div class="col-12 table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th> Infos Clients </th>
                    <th> Type de biens </th>
                    <th> Détails </th>
                    <th> Postée le: </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tenLastEstimations as $estimation)
                    <tr>
                    <td>
                        {{$estimation->user->fullName}}
                    </td>
                    <td> {{$estimation->propertyType->name}} </td>
                    <td>
                        <label class="badge badge-gradient-success">{{"$estimation->nbr_rooms Pieces"}}</label>
                        <label class="badge badge-gradient-success">{{"$estimation->address"}}</label>
                    </td>
                    <td>
                        {{$estimation->creationdate}}
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
