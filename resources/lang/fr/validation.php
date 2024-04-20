<?php

return [
    'accepted' => 'L\'attribut :attribute doit être accepté.',
    'accepted_if' => ' :attribute doit être accepté lorsque :other vaut :value',
    'active_url' => ':attribute n\'est pas une URL valide.',
    'after' => ':attribute doit être une date après :date.',
    'after_or_equal' => ':attribut doit être une date postérieure ou égale à :date.',
    'alpha' => ':attribute ne doit contenir que des lettres',
    'alpha_dash' => ':attribute doit contenir que des lettres, des chiffres, des tirets et des underscores.',
    'alpha_num' => ':attribute ne doit contenir que des lettres et des chiffres',
    'array' => ':attribute doit être un tableau',
    'before' => ':attribute doit être une date avant :date.',
    'before_or_equal' => ':attribute  doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => ':attribut doit avoir entre :min et :max éléments.',
        'file' => ':attribut doit être compris entre :min et :max kilo-octets',
        'numeric' => ':attribut doit être compris entre :min et :max',
        'string' => ':attribut doit être compris entre :min et :max caractères',
    ],
    'boolean' => ':le champ d\'attribut doit être vrai ou faux.',
    'confirmed' => ':la confirmation de l\'attribut ne correspond pas.',
    'current_password' => 'le mot de passe est incorrect.',
    'date' => ':attribut n\'est pas une date valide.',
    'date_equals' => ':attribute doit être une date égale à :date.',
    'date_format' => ':attribut ne correspond pas au format :format.',
    'declined' => ':attribut doit être refusé.',
    'declined_if' => ':attribute doit être refusé lorsque :other vaut :value.',
    'different' => ':attribute et :other doivent être différents.',
    'digits' => ':attribut doit être composé de :chiffres chiffres.',
    'digits_between' => 'La valeur doit être compriss entre :min et :max chiffres.',
    'dimensions' => ':attribut a des dimensions d\'image non valides.',
    'distinct' => ':le champ d\'attribut a une valeur en double.',
    'email' => ':attribut doit être une adresse e-mail valide.',
    'ends_with' => ':attribute doit se terminer par l\'un des éléments suivants : :values.',
    'enum' => 'La selection n\'est pas valide.',
    'exists' => 'La selection n\'est pas valide.',
    'file' => ':attribut doit être un fichier.',
    'filled' => ':attribut doit avoir une valeur.',
    'gt' => [
        'array' => ':attribute must have more than :value items.',
        'file' => ':attribute must be greater than :value kilobytes.',
        'numeric' => ':attribute must be greater than :value.',
        'string' => ':attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => ':attribute must have :value items or more.',
        'file' => ':attribute must be greater than or equal to :value kilobytes.',
        'numeric' => ':attribute must be greater than or equal to :value.',
        'string' => ':attribute must be greater than or equal to :value characters.',
    ],
    'image' => ':attribute n\'est pas une image.',
    'in' => 'selected :attribute est invalide.',
    'in_array' => ':attribute field does not exist in :other.',
    'integer' => ':attribute must be an integer.',
    'ip' => ':attribute must be a valid IP address.',
    'ipv4' => ':attribute must be a valid IPv4 address.',
    'ipv6' => ':attribute must be a valid IPv6 address.',
    'json' => ':attribute must be a valid JSON string.',
    'lt' => [
        'array' => ':attribute must have less than :value items.',
        'file' => ':attribute must be less than :value kilobytes.',
        'numeric' => ':attribute must be less than :value.',
        'string' => ':attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => ':attribute must not have more than :value items.',
        'file' => ':attribute must be less than or equal to :value kilobytes.',
        'numeric' => ':attribute must be less than or equal to :value.',
        'string' => ':attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => ':attribute must be a valid MAC address.',
    'max' => [
        'array' => ':attribute must not have more than :max items.',
        'file' => ':attribute ne doit pas être superieur à :max kilobytes.',
        'numeric' => ':attribute ne doit pas être superieur à :max.',
        'string' => 'La valeur ne doit pas faire plus de :max caractères.',
    ],
    'mimes' => ':attribute doit être un fichier de type: <strong> :values. </strong>',
    'mimetypes' => ':attribute doit être un fichier de type: <strong> :values. </strong>',
    'min' => [
        'array' => ':attribute doit contenir au moins :min elements.',
        'file' => ':attribute doit avoir une taille d\'au moins :min kilobytes.',
        'numeric' => ':attribute doit avoir une valeur minimale de :min.',
        'string' => 'Le champ doit comporter au moins :min caractères.',
    ],
    'multiple_of' => ':attribute must be a multiple of :value.',
    'not_in' => 'selected :attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute must be a number.',
    'present' => ':attribute field must be present.',
    'prohibited' => ':attribute field is prohibited.',
    'prohibited_if' => ':attribute field is prohibited when :other is :value.',
    'prohibited_unless' => ':attribute field is prohibited unless :other is in :values.',
    'prohibits' => ':attribute field prohibits :other from being present.',
    'regex' => ':attribute format is invalid.',
    'required' => 'Cette valeur est requise ...',
    'required_array_keys' => ':attribute field must contain entries for: :values.',
    'required_if' => ':attribute field is required when :other is :value.',
    'required_unless' => ':attribute field is required unless :other is in :values.',
    'required_with' => ':attribute field is required when :values is present.',
    'required_with_all' => ':attribute field is required when :values are present.',
    'required_without' => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same' => ':attribute and :other must match.',
    'size' => [
        'array' => ':attribute must contain :size items.',
        'file' => ':attribute must be :size kilobytes.',
        'numeric' => ':attribute must be :size.',
        'string' => ':attribute must be :size characters.',
    ],
    'starts_with' => ':attribute must start with one of following: :values.',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid timezone.',
    'unique' => 'Cette valeur pour le champ :attribute est déjà utilisée.',
    'uploaded' => ':attribute échec du chargement. Vérifiez la taille et l\'extension du fichier.',
    'url' => ':attribute must be a valid URL.',
    'uuid' => ':attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
