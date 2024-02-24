<div class="flex space-x-1 justify-around">
    @if (isset($showLink))
        <a href="{{ $showLink }}" class="inline-block px-1 py-1
        text-teal-600 font-xs text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5
         focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
           <i class="fa fa-eye"></i>
        </a>
    @endif
    @if (isset($editLink))
        <a href="{{ $editLink }}" class="inline-block px-1 py-1
        text-teal-600 font-xs text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5
         focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
            <span class="fa fa-pencil-square-o"></span>
        </a>
    @endif
    @if (isset($customLinks))
        @foreach($customLinks as $link)
            <a href="{{ $link[1] }}" class="inline-block px-1 py-1
            text-teal-600 font-xs text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5
             focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                {!! $link[0] !!}
            </a>
        @endforeach
    @endif
    <!-- Button trigger modal -->
    @if (isset($deleteLink))
        <button type="button"
                class="inline-block px-1 py-1 text-red-600 font-xs text-xs leading-tight
                 uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition
                 duration-150 ease-in-out"
                data-bs-toggle="modal"
                data-bs-target="#communDeleteModal"
                data-title="{{__('Confirmer la suppression')}}"
                data-content="{{$deleteMessage}}"
                data-action="{{$deleteLink}}"
                @click.stop="whenDeleteClicked($event)"
                aria-label="Supprimer"
        >
            <span class="fa fa-trash-o"
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