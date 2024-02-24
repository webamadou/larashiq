<div class="flex space-x-1 justify-around">
    <!-- Button trigger modal -->
    @if (isset($alert))
      <button class="inline-block px-6 py-2.5 text-blue-600 font-medium text-xs leading-tight uppercase" data-bs-toggle="modal" data-bs-target="#alertDetails{{$alert->id}}" >
          <i class="fa fa-eye"></i>
      </button>
      <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="alertDetails{{$alert->id}}" tabindex="-1" aria-labelledby="alertDetails{{$alert->id}}" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
          <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
              <h5 class="text-xl text-black font-bold leading-normal text-gray-800"
                  id="alertDetails{{$alert->id}}Label">
                REF: {{$alert->ref}}
              </h5>
              <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
                <div class="py-3 border-b-1 flex">
                    <p><b>Créée par:</b></p>
                    <p class="ml-3.5">
                        {{$alert->user->full_name}}<br>
                        {{$alert->user->email}}<br>
                        {{$alert->user->telephone}}
                    </p>
                </div>
                <div><hr class="text-immogray2"></div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Type de bien:</b></p>
                    <p class="ml-3.5">{{$alert->propertyTypes->pluck('name')->implode(', ')}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Budget:</b></p>
                    <p class="ml-3.5">Entre {{$alert->getFormatJsonValues('budget_range', ' et ')}} FCFA</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Localisations:</b></p>
                    <p class="ml-3.5">{{$alert->localisations->pluck('name')->implode(', ')}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Nbr pieces:</b></p>
                    <p class="ml-3.5">{{$alert->getFormatJsonValues('rooms_range', ' - ')}}</p>
                    <p class="ml-3.5"><b>Nbr Chambres:</b></p>
                    <p class="ml-3.5">{{$alert->getFormatJsonValues('bed_room_range', ' - ')}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Etages:</b></p>
                    <p class="ml-3.5">{{$alert->getFormatJsonValues('floor_range', ' - ')}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Surface:</b></p>
                    <p class="ml-3.5">{!!$alert->formatSurfaceRange!!}</p>
                </div>
                <div><hr class="text-immogray2"></div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Créée le:</b></p>
                    <p class="ml-3.5">{{$alert->creationDate}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Dernier envoie:</b></p>
                    <p class="ml-3.5">{{$alert->dateLastSentAlert}}</p>
                </div>
                <div class="py-3 border-b-1 flex">
                    <p><b>Nbr envoie:</b></p>
                    <p class="ml-3.5">{{$alert->nbr_sent}}</p>
                </div>
            </div>
            <div
              class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                <div x-data="{ open: false }">
                    <button type="button"
                    class="inline-block px-6 py-2.5 bg-immopink text-white font-medium text-xs leading-tight uppercase rounded
                    shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-dismiss="modal" aria-label="Fermer">
                        fermer
                    </button>
                    <button type="button"
                            x-on:click="open = ! open"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase
                    rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1" aria-label="Desactiver cette alerte">
                        Desactiver cette alerte
                    </button>
                    <div x-show="open" class="flex justify-center">
                        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm"
                             style="position: absolute; top: 35%; left: 10%; padding: 2vh; border: 2px solid #e4e4e4; border-radius: 0; ">
                            <strong class="text-gray-900 text-xl leading-tight font-medium mb-2">Désactivater l'alerte</strong>
                            <p class="text-gray-700 text-base mb-4">{{__('alerts.confirm_disable_message')}}</p>
                            <form action="{{route('bo.alerts.update', $alert)}}" method="post">
                                @method('PUT')
                                @csrf
                                <button
                                    type="submit"
                                    class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase" aria-label="Confirmer">
                                    {{__('Confirmer')}}
                                </button>
                                <button
                                    type="button"
                                    x-on:click="open = false"
                                    class="inline-block px-6 py-2.5 bg-immogray1 text-black font-medium text-xs
                                    leading-tight uppercase" aria-label="Annuler">
                                    {{__('Annuler')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    @endif
</div>
