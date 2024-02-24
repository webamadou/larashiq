{{ Aire::input('bilboard_title', "Titre sur la page d'accueil*")
	->id('bilboard_title')
	->required()
	->type('text')
	->value(old('bilboard_title', $configuration->bilboard_title))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}
<!--{ { Aire::input('bilboard_subtitle', "Sous Titre sur la page d'accueil")
	->id('bilboard_subtitle')
	->type('text')
	->value(old('bilboard_subtitle', $configuration->bilboard_subtitle_title))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	} }-->

{{ Aire::input('customer_space_url', "Lien de l'espace client*")
	->id('customer_space_url')
	->type('text')
	->value(old('customer_space_url', $configuration->customer_space_url))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

<h2 class="text-2xl">Vidéo de la page d'accueil</h2>
<hr>

{{ Aire::input('home_video_title', "Titre de la vidéo en page d'accueil*")
    ->id('home_video_title')
    ->required()
    ->type('text')
    ->value(old('home_video_title', $configuration->home_video_title))
    ->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
    }}

{{ Aire::textArea('home_video_subtitle', "Description de la vidéo en page d'accueil*")
    ->id('home_video_subtitle')
    ->required()
    ->value(old('home_video_subtitle', $configuration->home_video_subtitle))
    ->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg tiny_editor')
    }}

{{ Aire::textArea('home_video_embed_code', 'Le code embed de la video')
    ->rows(6)
    ->cols(40)
    ->value(old('home_video_embed_code', $configuration->home_video_embed_code))
    ->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg');
}}
{!! $configuration->home_video_embed_code !!}
<h2 class="mt-10">&nbsp;</h2>
<h2 class="text-2xl">Vidéo d'annonce de la page d'accueil</h2>
<hr>
{{ Aire::textArea('home_bloc_one_video', 'Le code embed de la video')
    ->rows(6)
    ->cols(40)
    ->value(old('home_bloc_one_video', $configuration->home_bloc_one_video))
    ->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg');
}}

{!! $configuration->home_bloc_one_video !!}

<h2 class="text-2xl">Contacts</h2>
<hr>

{{ Aire::input('official_address', "Adresse entête")
	->id('official_address')
	->type('text')
	->value(old('official_address', $configuration->official_address))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::input('official_phone_nums', "Numéro téléphone entête")
	->id('official_phone_nums')
	->type('text')
	->value(old('official_phone_nums', $configuration->official_phone_nums))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::input('official_email_address', "Adresse Email")
	->id('official_email_address')
	->type('text')
	->value(old('official_email_address', $configuration->official_email_address))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

<h1 class="text-2xl">Réseaux sociaux</h1>
<hr>

{{ Aire::input('facebook_link', "Facebook")
	->id('facebook_link')
	->required()
	->type('text')
	->value(old('facebook_link', $configuration->facebook_link))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}
{{ Aire::input('linkedin_link', "LinkedIn")
	->id('linkedin_link')
	->required()
	->type('text')
	->value(old('linkedin_link', $configuration->linkedin_link))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}
{{ Aire::input('instagram_link', "Instagram")
	->id('instagram_link')
	->required()
	->type('text')
	->value(old('instagram_link', $configuration->instagram_link))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}
{{ Aire::input('twiter_link', "Twitter")
	->id('twiter_link')
	->required()
	->type('text')
	->value(old('twiter_link', $configuration->twiter_link))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}
{{ Aire::submit('Enregistrer') }}
