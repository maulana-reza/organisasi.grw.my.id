<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    const JABATAN_OPTIONS = [
                    'ketua umum', 'ketua wilayah', 'sekretaris', 'wakil sekretaris',
                    'bendahara', 'wakil bendahara', 'bidang humas', 'bidang sosial', 'bidang pendidikan'
                ];
    protected $fillable = [
        'jabatan', 'provinsi_id', 'kabupaten_kota_id',
        'anggota_id', 'alamat_kantor_id'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function alamatKantor()
    {
        return $this->belongsTo(AlamatKantor::class, 'alamat_kantor_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id');
    }
}
