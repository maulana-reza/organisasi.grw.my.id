<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $primaryKey = 'id_organisasi';

    protected $fillable = [
        'nama_organisasi',
        'tahun_berdiri',
        'peran',
        'tujuan',
        'kegiatan',
        'sejarah',
        'deskripsi',
    ];

    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'organisasi_id');
    }

    public function naungans()
    {
        return $this->hasMany(OrganisasiNaungan::class, 'organisasi_id');
    }

    public function getKetuaAttribute()
    {
        $anggota = $this->anggotas()
            ->whereHas('jabatans', function ($query) {
                return $query->where('jabatan', 'ketua umum')
                    ->whereHas('alamatKantor', function ($query) {
                        return $query->where('type', 'kantor pusat');
                    });
            })
            ->first();
        return $anggota ? $anggota->toArray() : [
            'nama_anggota' => 'N/A',
            'alamat' => 'N/A',
            'foto' => 'N/A',
            'no_hp' => 'N/A',
            'email' => 'N/A',
        ];

    }
}
