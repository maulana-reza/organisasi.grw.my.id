<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $primaryKey = 'id_provinsi';

    protected $fillable = ['id_provinsi','nama_provinsi'];

    public function kabupatenKotas()
    {
        return $this->hasMany(KabupatenKota::class, 'provinsi_id');
    }

    public function naungans()
    {
        return $this->hasMany(OrganisasiNaungan::class, 'provinsi_id');
    }

    public function alamatKantors()
    {
        return $this->hasMany(AlamatKantor::class, 'provinsi_id');
    }
}
