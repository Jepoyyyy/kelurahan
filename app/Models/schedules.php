<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'place',
        'date',
        'description',
        'is_done'
    ];
}
