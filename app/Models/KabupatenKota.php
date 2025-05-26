<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    protected $primaryKey = 'id_kabupaten_kota';

    protected $fillable = ['provinsi_id', 'nama_kabupaten'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function alamatKantors()
    {
        return $this->hasMany(AlamatKantor::class, 'kabupaten_kota_id');
    }
}

