<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'pekerjaan',
        'alamat',
        'rt',
        'status',
        'beristrike',
        'nama_partner_sebelumnya'
    ];
    public function ayah()
    {
        return $this->hasOne(Ayah::class);
    }

    public function ibu()
    {
        return $this->hasOne(Ibu::class);
    }

}
