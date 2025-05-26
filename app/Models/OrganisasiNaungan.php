<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisasiNaungan extends Model
{
    protected $fillable = [
        'organisasi_id',
        'provinsi_id',
        'jumlah_anggota',
        'nama_organiasi'
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'organisasi_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
}
