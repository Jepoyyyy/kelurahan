<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'namaayah',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'pekerjaan',
        'alamat',
        'pemohon_id',
    ];

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class);
    }
}
