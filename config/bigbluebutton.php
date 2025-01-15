<?php

return [
    /*
    |--------------------------------------------------------------------------
    | BigBlueButton Server Settings
    |--------------------------------------------------------------------------
    */

    'BBB_SECURITY_SALT'   => env('BBB_SECURITY_SALT', ''),
    'BBB_SERVER_BASE_URL' => env('BBB_SERVER_BASE_URL', ''),

    'create' => [
        'attendeePW' => 'attendee',
        'moderatorPW' => 'moderator',
        'welcome' => 'Welcome to BigBlueButton!',
        'maxParticipants' => 100,
        'logoutURL' => env('APP_URL', 'http://localhost'),
        'record' => true,
        'duration' => 0,
    ],
];
