<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class news extends Model
{
    use HasFactory;

     protected $table = 'newss';
    protected $fillable = [
        'title',
        'picture',
        'description'
    ];
}
