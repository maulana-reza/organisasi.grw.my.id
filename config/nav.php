<?php
return [
    'dashboard' => [
        'icon' => 'heroicon-o-adjustments',
        'route' => 'dashboard',
        'can' => 'dashboard',
    ],
    'anggota' => [
        'icon' => 'heroicon-o-adjustments',
        'route' => 'anggota',
        'can' => 'anggota',
    ],
    'pengaturan' => [
        'icon' => 'heroicon-o-adjustments',
        'route' => 'pengaturan',
        'can' => 'pengaturan',
    ],
    'organisasi' => [
        'icon' => 'heroicon-o-adjustments',
        'route' => 'organisasi-naungan',
        'can' => 'organisasi-naungan',
    ],
    'referensi' => [
        'icon' => 'heroicon-o-adjustments',
        'can' => 'referensi',
        'child' => [
            'provinsi' => [
                'icon' => 'heroicon-o-adjustments',
                'route' => 'provinsi',
                'can' => 'provinsi',
            ],
            'kabupaten-kota' => [
                'icon' => 'heroicon-o-adjustments',
                'route' => 'kabupaten-kota',
                'can' => 'kabupaten-kota',
            ],
            'alamat-kantor' => [
                'icon' => 'heroicon-o-adjustments',
                'route' => 'alamat-kantor',
                'can' => 'alamat-kantor',
            ],
        ]
    ],
];
