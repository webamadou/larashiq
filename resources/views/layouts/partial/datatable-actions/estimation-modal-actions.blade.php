<div class="flex space-x-1 justify-around">
    <!-- Button trigger modal -->
    @if (isset($estimation))
      <button class="inline-block px-6 py-2.5 text-blue-600 font-medium text-xs leading-tight uppercase" data-bs-toggle="modal" data-bs-target="#estimationDetails{{$estimation->id}}" aria-label="Afficher">
          <i class="fa fa-eye"></i>
      </button>
      <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="estimationDetails{{$estimation->id}}" tabindex="-1" aria-labelledby="estimationDetails{{$estimation->id}}" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
          <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
              <h5 class="text-xl text-black font-bold leading-normal text-gray-800"
                  id="alertDetails{{$estimation->id}}Label">
                REF: {{$estimation->ref}}
              </h5>
              <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
                <div class="py-3 border-b-1 flex">
                    <p><b>Infos du demandeur:</b></p>
                    <p class="ml-3.5">
                        {{$estimation->user->email}}<br>
                        {{$estimation->user->phone_number}}
                    </p>
                </div>
                <div><hr class="text-immogray2"></div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Type de bien:</b></p>
                    <p class="ml-3.5">{{$estimation->propertyType->name}}</p>
                    <p><b>Type de bien:</b></p>
                    <p class="ml-3.5">{{$estimation->propertyType->name}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Adresse:</b></p>
                    <p class="ml-3.5">{{$estimation->address}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Pieces:</b></p>
                    <p class="ml-3.5"><b>Nbr pieces:</b> {{$estimation->nbr_rooms}}</p>
                    <p class="ml-3.5">-</p>
                    <p class="ml-3.5"><b>Surface du bien:</b> {{$estimation->nbr_rooms}}m<sup>2</sup></p>
                    <p class="ml-3.5"><b>Surface du sejour:</b> {{$estimation->living_room_surface}}m<sup>2</sup></p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <h1>Salle de bain et douches</h1>
                    <p class="ml-3.5"></p>
                    <p class="ml-3.5"><b>Nombre de salle d'eau(Douche):</b> {{$estimation->nbr_water_room}}</p>
                    <p class="ml-3.5"><b>Nombre de salle de bains (Baignoire):</b> {{$estimation->nbr_bathroom}}</p>
                </div>
                <div><hr class="text-immogray2"></div>
                <div class="py-3 border-b-1 flex">
                    <h1>Equipements et caracteristiques</h1>
                    <p class="ml-3.5"><b>Type de cuisine</b><br>{{$estimation->kitchenLabel}}</p>
                    <p class="ml-3.5"><b>Nbr Parking</b><br>{{$estimation->nbr_parking}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <h3> - </h3>
                    <p class="ml-3.5"><b>Etat du bien: </b><br>{{$estimation->etat}}</p>
                </div>
                <div><hr class="text-immogray2"></div>
                <div class="">
                    <div class="block w-full">Modifier le statut de l'estimation</div>
                    <div class="py-3 border-b-1 flex justify-start">
                    {{Aire::select(\App\Models\Estimation::getStatus(), 'status', 'Status')
                        ->id('select-status')
                        ->value(old('status', $estimation->status))
                        ->addClass('update-status')
                        ->data('id', $estimation->id)
                        ->helpText("Sélectionnez pour modifier le statut de l'estimation");
                    }}
                    </div>
                </div>
            </div>
            <div
              class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                <button type="button" aria-label="Fermer"
                class="inline-block px-6 py-2.5 bg-immopink text-white font-medium text-xs leading-tight uppercase rounded
                shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-dismiss="modal">
                    fermer
                </button>
            </div>
          </div>
        </div>
      </div>
    @endif
    @if (isset($deleteLink))
        <button type="button"
                class="inline-block px-1 py-1 text-red-600 font-xs text-xs leading-tight
                 uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition
                 duration-150 ease-in-out"
                aria-label="Fermer"
                data-bs-toggle="modal"
                data-bs-target="#communDeleteModal"
                data-title="{{__('Confirmer la suppression')}}"
                data-content="{{$deleteMessage}}"
                data-action="{{$deleteLink}}"
                @click.stop="whenDeleteClicked($event)"
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