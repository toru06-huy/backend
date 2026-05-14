<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure CORS settings for your application.
    | This allows your React frontend to make requests to your API.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:3000',      // React development server
        'http://localhost:5173',      // Vite development server
        'http://localhost:5174',      // Alternative Vite port
        'http://127.0.0.1:3000',
        'http://127.0.0.1:5173',
        // For production, add your actual domain:
        // 'https://yourdomain.com',
    ],

    'allowed_origins_patterns' => [
        // '#^https://.*\.example\.com$#',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
