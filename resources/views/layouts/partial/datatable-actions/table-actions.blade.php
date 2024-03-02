<div class="flex space-x-1 justify-around">
    @if (isset($showLink))
        <a href="{{ $showLink }}" class="btn btn-primary p-2" style="color: #fff">
           <i class="mdi mdi-eye"></i>
        </a>
    @endif
    @if (isset($editLink))
        <a href="{{ $editLink }}" class="btn btn-success p-2" style="color: #fff">
            <span class="mdi mdi-pencil"></span>
        </a>
    @endif
    @if (isset($customLinks))
        @foreach($customLinks as $link)
            <a href="{{ $link[1] }}" class="mdi mdi-primary p-2">
                {!! $link[0] !!}
            </a>
        @endforeach
    @endif
    <!-- Button trigger modal -->
    @if (isset($deleteLink) && ! empty($deleteLink))
        <button type="button"
                class="btn btn-danger p-2"
                data-bs-toggle="modal"
                data-bs-target="#communDeleteModal"
                data-title="{{__('Confirmer la suppression')}}"
                data-content="{{$deleteMessage}}"
                data-action="{{$deleteLink}}"
                @click.stop="whenDeleteClicked($event)"
                aria-label="Supprimer"
        >
            <span class="mdi mdi-delete"
               data-bs-toggle="modal"
               data-bs-target="#communDeleteModal"
               data-title="{{__('Confirmer la suppression')}}"
               data-content="{{$deleteMessage}}"
               data-action="{{$deleteLink}}"
            ></span>
        </button>
        {{--@include('datatables::delete', ['value' => $id])--}}
    @endif
</div>