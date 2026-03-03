<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ayah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'kewarganegaraan',
        'agama',
        'pekerjaan',
        'alamat',
        'rt',
        'pemohon_id'
    ];
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class);
    }
}
