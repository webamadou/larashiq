@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Liste des menus')}}
@endsection
@section('content')
    <livewire:menu />
@endsection
@section('js_scripts')
    <script>
        document.querySelectorAll('[drag-root]').forEach(thisRoot => {
            let dragged = null;
            thisRoot.querySelectorAll('[drag-item]').forEach(el => {
                el.addEventListener('dragstart', e => {
                    dragged = e.target;
                })
                el.addEventListener('drop', e => {
                    e.target.classList.remove('bg-immopurple', 'text-white')

                    // get the dragging element
                    let draggingEl = thisRoot.querySelector('[dragging="true"]')
                    // Insert it before the drop target
                    if (e.target.getAttribute('data-position') > dragged.getAttribute('data-position')) {
                        e.target.after(dragged)
                    } else {
                        e.target.before(dragged)
                    }

                    // Refresh the livewire component
                    let LWComponent = Livewire.find(
                        e.target.closest('[wire\\:id]').getAttribute('wire:id')
                    )

                    let itemsOrder = Array.from(thisRoot.querySelectorAll('[drag-item]'))
                        .map(itemEl => itemEl.getAttribute('data-id'))

                    LWComponent.call('updatePositions', itemsOrder)
                    location.reload()
                })
                el.addEventListener('dragenter', e => {
                    if (e.target.tagName === "LI") {
                        e.target.classList.add('bg-immopurple', 'text-white')
                    }

                    e.preventDefault()
                })
                el.addEventListener('dragover', e => e.preventDefault())
                el.addEventListener('dragleave', e => {
                    e.target.classList.remove('bg-immopurple', 'text-white')
                })
                el.addEventListener('dragend', e => {
                    e.target.removeAttribute('dragging')
                })
            })
        })
    </script>
    <script>
        // Toastr activation for livewire
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });

        $( document ).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           $('body').on('submit', '#storeMenu', function(e) {
                e.preventDefault();
                const url = $(this).attr('action');
                const data = $(this).serializeArray();
                $.ajax({
                    url: `${url}`,
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data
                }).done(function (data){
                    if (data.message === 'SUCCESS') {
                        document.getElementById('loader').classList.add('active');
                        toastr.info(data.message, 'SUCCESS', {timeOut: 5000});

                        location.reload();
                    } else {
                        toastr.info('Le lien a été enregistré avec succès.', 'ERROR', {timeOut: 5000});
                    }
                }).fail(function (jqXHR, ajaxOptions, thrownError) {
                   console.log('No response from server', thrownError, ajaxOptions);
                });
            })

           $('body').on('submit', '#storeMenuItem', function(e) {
                e.preventDefault();
                const url = $(this).attr('action');
                const data = $(this).serializeArray();
                $.ajax({
                    url: `${url}`,
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data
                }).done(function (data){
                    if (data.message === 'SUCCESS') {
                        document.getElementById('loader').classList.add('active');
                        toastr.info('Le lien a été enregistré avec succès.', 'SUCCESS', {timeOut: 5000});

                        location.reload();
                    }
                }).fail(function (jqXHR, ajaxOptions, thrownError) {
                   console.log('No response from server');
                });
            })
        });
    </script>
@endsection
