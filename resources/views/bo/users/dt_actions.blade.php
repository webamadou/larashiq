<div class="table-cell px-6 py-2   text-left  whitespace-no-wrap text-sm text-gray-900 px-6 py-2">
    <div class="flex space-x-1 justify-around">
        <a href="{{route('bo.users.show', $user->id)}}" class="btn btn-primary p-2" style="color: #fff">
           <i class="mdi mdi-eye"></i>
        </a>
        <a href="{{route('bo.users.edit', $user->id)}}" class="btn btn-success p-2" style="color: #fff">
            <span class="mdi mdi-pencil"></span>
        </a>
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger p-2" data-action="{{ route('bo.users.destroy', $user->id) }}" @click.stop="whenDeleteClicked($event)" aria-label="Supprimer">
            <span class="mdi mdi-delete" data-bs-toggle="modal" data-bs-target="#communDeleteModal" data-title="Confirmer la suppression" data-content="Veuillez confirmer la suppression de l'article 🏡 Le Home Staging : Transformez votre intérieur en un espace irrésistible, propice à la détente ! ☕"></span>
        </button>
    </div>
</div>
