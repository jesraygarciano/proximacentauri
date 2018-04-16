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
        'client_id'     => '192564384662924',
        'client_secret' => '66d451f9d7117b6712cb6a384f5293b0',
        'redirect'      => 'http://localhost:8000/facebook/callback',
    ],

    'github' => [
        'client_id'     => 'a023a3de6d6fc893a1e8',
        'client_secret' => '239b4672e2f559a61cff0289e3f790863034e827',
        'redirect'      => 'http://localhost:8000/github/callback',
    ],

];
