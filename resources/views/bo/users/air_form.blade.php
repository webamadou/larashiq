<label for="first_name" class="title">Le prenom de l'utilisateur *</label>
{{ Aire::input('first_name')
	->id('first_name')
	->required()
	->type('text')
	->value(old('first_name', $user->first_name))
	->addClass('form-control')
	}}
<label for="name" class="title">Le nom de l'utilisateur *</label>
{{ Aire::input('name')
	->id('name')
	->required()
	->type('text')
	->value(old('name', $user->name))
	->addClass('form-control')
	}}
<label for="email" class="email">L'adresse email *</label>
{{ Aire::input('email')
	->id('email')
	->required()
	->type('email')
	->value(old('email', $user->email))
	->addClass('form-control')
	}}
<label for="gender" class="title"> Genre</label>
{{ Aire::radioGroup(['0' => 'Femme', '1' => 'Homme'], 'gender')
	->defaultValue(old('gender', $user->gender ?? ''))
	->required()
    }}
<div style="background-color: var(--immogray2)" class="p-2">
	<label for="roles" class="title">Attribuer un role *</label>
	{{ Aire::checkboxGroup($roles, 'roles')
		->value(old('roles', $user->getRoleNames()->toArray()))
		->helpText("Vous pouvez attribuer un ou plusieurs rôles à un utilisateur.")
		}}
</div>
<hr>
<label for="address" class="title">L'adresse</label>
{{ Aire::input('address')
	->id('address')
	->type('text')
	->value($user->address)
	->addClass('form-control')
	}}

<label for="phone_number" class="title">Numéro de téléphone</label>
{{ Aire::input('phone_number')
	->id('phone_number')
	->type('text')
	->value($user->phone_number)
	->addClass('form-control')
	}}

<label for="birth_date" class="title">Date de naisance</label>
{{ Aire::input('birth_date')
	->id('birth_date')
	->type('text')
	->addClass('datepicker_element')
	->value($user->birth_date)
	->addClass('form-control')
	}}

<label for="birth_place" class="title">Lieu de naissance</label>
{{ Aire::input('birth_place')
	->id('birth_place')
	->type('text')
	->value($user->birth_place)
	->addClass('form-control')
	}}

{{ Aire::submit('Enregistrer')->addClass('btn btn-primary float-end') }}

<script defer>
  $( function() {
    $( ".datepicker_element" ).datepicker({
        "dateFormat": 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "{{\App\Models\User::formYearRange()}}"
    });
  } );
</script>
