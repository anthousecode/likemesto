<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id'     => env('FACEBOOK_ID','283825148887690'),
        'client_secret' => env('FACEBOOK_SECRET','7670345554a1ad976c3bce1aa09c2a0e'),
        'redirect'      => env('FACEBOOK_URL'),
    ],
    'google' => [

        'client_id' => env('GOOGLE_CLIENT_ID'),

        'client_secret' => env('GOOGLE_CLIENT_SECRET'),

        'redirect' => env('GOOGLE_CALLBACK_URL'),

    ],
    'vkontakte' => [
        'client_id' => env('VKONTAKTE_CLIENT_ID'),
        'client_secret' => env('VKONTAKTE_CLIENT_SECRET'),
        'redirect' => env('VKONTAKTE_CALLBACK_URL'),
    ],
];
