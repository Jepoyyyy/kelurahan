<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kependudukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nik',
        'alamat',
        'rt_id',
        'status',
        'tanggal_lahir'
    ];
}
