<?php

return [
    /*
    |--------------------------------------------------------------------------
    | MyAnimeList API Client ID
    |--------------------------------------------------------------------------
    |
    | Daftarkan aplikasi Anda di MyAnimeList Developer:
    | https://myanimelist.net/apiconfig
    | Masukkan Client ID Anda ke dalam file .env (MAL_CLIENT_ID).
    |
    */
    'client_id' => env('MAL_CLIENT_ID', null),

    'base_url' => 'https://api.myanimelist.net/v2',

    'cache_ttl' => env('MAL_CACHE_TTL', 86400), // 24 jam
];
