<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlamatKantor extends Model
{
    protected $primaryKey = 'id_alamat_kantor';
    protected $fillable = [
        'provinsi_id',
        'kabupaten_kota_id',
        'alamat',
        'type'
    ];
    const OPT = [
        self::KAB => 'Kantor Kabupaten',
        self::PROV => 'Kantor Provinsi',
        self::PUSAT => 'Kantor Pusat'
    ];
    const KAB = 'kantor kabupaten';
    const PROV = 'kantor provinsi';
    const PUSAT = 'kantor pusat';

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id');
    }

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class, 'alamat_kantor_id');

    }

    public function ketuaUmum()
    {
        $jabatan = $this->jabatan()
            ->where('jabatan', 'ketua umum')
            ->first();
        return $jabatan ? $jabatan->anggota->nama_anggota : 'N/A';

    }
}

