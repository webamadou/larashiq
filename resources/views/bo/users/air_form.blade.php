<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

{{ Aire::input('first_name', "Le prenom de l'utilisateur *")
	->id('first_name')
	->required()
	->type('text')
	->value(old('first_name', $user->first_name))
	->addClass('form-control')
	}}

{{ Aire::input('name', "Le nom de l'utilisateur *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $user->name))
	->addClass('form-control')
	}}

{{ Aire::input('email', "L'adresse email *")
	->id('email')
	->required()
	->type('email')
	->value(old('email', $user->email))
	->addClass('form-control')
	}}

{{ Aire::radioGroup(['0' => 'Femme', '1' => 'Homme'], 'gender')
	->label('Genre')
	->defaultValue(old('gender', $user->gender ?? ''))
	->required()
    }}
<div style="background-color: var(--immogray2)"></div>
{{ Aire::checkboxGroup($roles, 'roles', 'Attribuer un role *')
    ->value(old('roles', $user->getRoleNames()->toArray()))
    ->helpText("Vous pouvez attribuer un ou plusieurs rôles à un utilisateur.")
    }}
<hr>
{{ Aire::input('address', "L'adresse")
	->id('address')
	->type('text')
	->value($user->address)
	->addClass('form-control')
	}}

{{ Aire::input('phone_number', "Numéro de téléphone")
	->id('phone_number')
	->type('text')
	->value($user->phone_number)
	->addClass('form-control')
	}}

{{ Aire::input('birth_date', "Date de naisance")
	->id('birth_date')
	->type('text')
	->addClass('datepicker_element')
	->value($user->birth_date)
	->addClass('form-control')
	}}

{{ Aire::input('birth_place', "Lieu de naissance")
	->id('birth_place')
	->type('text')
	->value($user->birth_place)
	->addClass('form-control')
	}}

{{ Aire::submit('Enregistrer') }}

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
