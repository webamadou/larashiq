<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'kayloo_api' => [
        'access_key' => env('KAYLOO_API_ACCESS_KEY'),
        'secret_key' => env('KAYLOO_API_SECRET_KEY'),
        'token_url' => 'https://api.sabluximmoplus.immo/token',
        'properties_url' => 'https://api.sabluximmoplus.immo/properties',
        'properties_images_path' => 'https://api.sabluximmoplus.immo/properties/images/path',
        'properties_images_base64' => 'https://api.sabluximmoplus.immo/properties/images/base64'
    ],
    'socials' => [
        'urls' => [
            'fb' => 'https://www.facebook.com/ImmoplusSablux?mibextid=LQQJ4d',
            'ig' => 'https://instagram.com/immoplus_its_sablux?igshid=YmMyMTA2M2Y=',
            'li' => 'https://www.linkedin.com/showcase/immoplus-it-s-sablux/',
        ]
    ]
];
