<?php

return [
    'manager' => [
        'api_token' => env('MT4_MANAGER_API_TOKEN'),
        'endpoint' => env('MT4_MANAGER_API_ENDPOINT'),
    ],
    'terminal' => [
        'api_token' => env('MT4_TERMINAL_API_TOKEN'),
        'endpoint' => env('MT4_TERMINAL_API_ENDPOINT'),
    ]
];
