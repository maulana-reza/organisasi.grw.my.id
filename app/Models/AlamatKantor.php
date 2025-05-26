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

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id');
    }
}

