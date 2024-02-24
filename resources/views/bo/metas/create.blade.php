@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__("Enregistrer les metas d'une page")}}
@endsection
@section('content')
<div class="w-full px-8 py-4 mx-auto mb-1">
    <a href="{{route('bo.metas.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a><br>

    <div class="w-full mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.metas.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('bo.metas.air_form')

            <div class="flex justify-end w-100 items-end border-t-2 border-immogray2 pt-6">
                <button class="mx-2 px-6 py-2.5 bg-green-600 text-white font-medium text-xs rounded-none" aria-label="Enregistrer">
                {!!__('common_terms.save')!!} <i class="fa fa-arrow-right"></i> </button>
            </div>
        </form>
    </div>
</div>
@endsection