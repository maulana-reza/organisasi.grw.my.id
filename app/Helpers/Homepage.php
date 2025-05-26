<?php

namespace App\Helpers;

use App\Models\AlamatKantor;
use App\Models\Anggota;
use App\Models\Organisasi;
use App\Models\OrganisasiNaungan;

class Homepage
{
    public static function homepage()
    {
        $organisasi = Organisasi::first();
        $result = $organisasi->toArray();
        $result['ketua'] = $organisasi->ketua ?: [
            'nama_anggota' => 'N/A',
            'alamat' => 'N/A',
            'alamat_kantor' => 'N/A',
            'jabatan' => 'N/A',
            'foto' => 'N/A',
            'no_hp' => 'N/A',
            'email' => 'N/A',
        ];
        return $organisasi ?  : [
            'nama_organisasi' => 'N/A',
            'tahun_berdiri' => 'N/A',
            'peran' => 'N/A',
            'tujuan' => 'N/A',
            'kegiatan' => 'N/A',
            'sejarah' => 'N/A',
            'deskripsi' => 'N/A',
            'ketua' => [
                'nama_anggota' => 'N/A',
                'alamat' => 'N/A',
                'alamat_kantor' => 'N/A',
                'jabatan' => 'N/A',
                'foto' => 'N/A',
                'no_hp' => 'N/A',
                'email' => 'N/A',
            ],
            'jumlah_organisasi' => OrganisasiNaungan::all()->count(),
            'jumlah_anggota' => Anggota::all()->count()
        ];
    }

    public static function getOrganisasi()
    {
        return OrganisasiNaungan::all();
    }
    public static function cakupanWilayah()
    {
        return AlamatKantor::all();
    }

}
