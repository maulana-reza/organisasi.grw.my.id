<?php

use Illuminate\Support\Facades\Route;

Route::impersonate();

Route::get('/', \App\Livewire\Homepage::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('pengaturan', \App\Livewire\OrganisasiReference::class)->name('pengaturan');
    Route::get('anggota', \App\Livewire\AnggotaReference::class)->name('anggota');
    Route::get('organisasi-naungan',\App\Livewire\OrganisasiNaunganReference::class)->name('organisasi-naungan');
    Route::prefix('referensi')
        ->group(function () {
            Route::get('provinsi', \App\Livewire\ProvinsiReference::class)->name('provinsi');
            Route::get('kabupaten-kota', \App\Livewire\KabupatenKotaReference::class)->name('kabupaten-kota');
            Route::get('alamat-kantor',\App\Livewire\AlamatKantorReference::class)->name('alamat-kantor');
        });
});
