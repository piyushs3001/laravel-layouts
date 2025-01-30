<?php
return [
    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => Piyush\LaravelLayouts\Models\Admin::class,
        ],
    ],
];