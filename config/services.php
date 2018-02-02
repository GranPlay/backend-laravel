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

    'firebase' => [
      'api_key' => "AIzaSyCKx5xAt36qBZQt_GG8mNQ59fV_-q8kxo0", // Only used for JS integration
      'auth_domain' => "firstproject-54f36.firebaseapp.com", // Only used for JS integration
      'database_url' => "https://firstproject-54f36.firebaseio.com",
      'secret' => 'DATABASE_SECRET',
      'projectId' => "firstproject-54f36",
      'storage_bucket' => "firstproject-54f36.appspot.com", // Only used for JS integration
      'messagingSenderId' => "964817220113"
    ],

];
