<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $primaryKey = 'id_anggota';

    protected $fillable = [
        'organisasi_id', 'nama_anggota', 'alamat',
        'foto', 'no_hp', 'email',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'organisasi_id');
    }

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class, 'anggota_id');
    }
}
