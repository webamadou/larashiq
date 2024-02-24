<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<div><p class="text-red-500 my-4 italic text-xs">Les champs avec * sont obligatoires</p></div>
<x-form-group label="Le prenom de l'utilisateur *" name="first_name" class="text-2xl">
    <x-input name="first_name" value="{{old('first_name', $user->first_name)}}"/>
</x-form-group>
<x-form-group label="Le nom de l'utilisateur *" name="name" class="text-2xl">
    <x-input name="name" value="{{old('name', $user->name)}}"/>
</x-form-group>
<x-form-group label="L'adresse email *" name="email" class="text-2xl">
    <x-input name="email" value="{{old('email', $user->email)}}"/>
</x-form-group>
<x-form-group label="Genre *" name="gender" class="grid grid-cols-2 gap-4 bg-immogray2 py-4">
    <div class="grid grid-cols-2 gap-4 px-3">
        <div>
            <div class="choice-container relative flex items-start">
                <div class="choice-input flex items-center h-5">
                    <input class="form-radio h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500"
                           name="gender"
                           id="gender_0"
                           type="radio"
                           value="0"
                    {{intval(old('roles', $user->gender)) === 0 ? 'checked="checked"' : ''}}>
                </div>
                <div class="choice-label ml-3 text-sm leading-5">
                    <label for="gender_0" class="font-medium text-slate-700">Femme</label>
                </div>
            </div>
        </div>
        <div>
            <div class="choice-container relative flex items-start">
                <div class="choice-input flex items-center h-5">
                    <input class="form-radio h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500"
                           name="gender"
                           id="gender_1"
                           type="radio"
                           value="1"
                        {{intval(old('roles', $user->gender)) === 1 ? 'checked="checked"' : ''}}>
                </div>
                <div class="choice-label ml-3 text-sm leading-5">
                    <label for="gender_1" class="font-medium text-slate-700">Homme</label>
                </div>
            </div>
        </div>
    </div>
</x-form-group>
<x-form-group label="Attribuer un role *" name="roles">
    <div class="flex flex-justify">
    @foreach($roles as $key => $role)
        <div class="form-check form-check-inline">
            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm
                bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition
                duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                   type="checkbox"
                   id="{{$role}}"
                   value="{{$role}}"
                   name="roles[]"
                   {{in_array($role, old('roles', $user->roles->pluck('name')->toArray())) ?
                   'checked="checked"' :
                    ''}}
            >
            <label class="form-check-label inline-block text-gray-800 text-base"
                   for="inlineCheckbox1">{{$role}}</label>
        </div>
    @endforeach
    </div>
</x-form-group>
<x-form-group label="L'adresse" name="address" class="text-2xl">
    <x-input name="address" value="{{old('address', $user->address)}}"/>
</x-form-group>
<x-form-group label="Numéro de téléphone" name="phone_number" class="text-2xl">
    <x-input name="phone_number" id="phone_number" value="{{old('phone_number', $user->phone_number)}}"/>
</x-form-group>
<x-form-group label="Attribuer un service " name="service" class="text-2xl">
    <x-select name="service" :options="[]" style="background: white !important;" />
</x-form-group>
<x-form-group label="Date de naisance" name="service" class="text-2xl">
        <x-input
            name="birth_date"
            id="birth_date"
            value="{{old('birth_date', $user->birth_date)}}"
            class="datepicker_element"
            id="datepicker_element"
        />
</x-form-group>
<x-form-group label="Lieu de naissance" name="birth_place" class="text-2xl">
    <x-input name="birth_place" value="{{old('birth_place', $user->birth_place)}}"/>
</x-form-group>


<script defer>
  $( function() {
    $( "#datepicker_element" ).datepicker({
        "dateFormat": 'yy-mm-dd'
    });
  } );
</script>
