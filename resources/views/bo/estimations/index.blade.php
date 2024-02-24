@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('estimations.bo_title_list')}}
    <x-audit-link model-name="Estimation" />
@endsection

@section('content')
<div class="flex space-x-2 justify-center">

</div>
<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-estimations />
</div>
@endsection
@section('js_scripts')
<script>
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.update-status').on('change', function(e){
            const id = $(this).data('id');
            const status = parseInt($(this).val());

            $.ajax({
                url: `{{url('backoffice/estimations/')}}/${id}`,
                type: 'put',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id, status}
            }).done(function (data){
                console.log(data.message)
                if (data.message === 'SUCCESS') {
                    toastr.info('Le statut a été mis à jour avec succès.', 'SUCCESS', {timeOut: 5000})
                    $(`.estimation_status[data-id='${id}']`).html(`${data.statusDot} ${data.txtMessage}`);
                }
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('No response from server');
            });
        })
    });
</script>
@endsection
