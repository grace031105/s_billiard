<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
    ],
    'pemilik' => [
        'driver' => 'session',
        'provider' => 'pemiliks',
    ],
    'pelanggan' => [
        'driver' => 'session',
        'provider' => 'pelanggans',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    'pemiliks' => [
        'driver' => 'eloquent',
        'model' => App\Models\Pemilik::class,
    ],
    'pelanggans' => [
        'driver' => 'eloquent',
        'model' => App\Models\Pelanggan::class,
    ],
],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
