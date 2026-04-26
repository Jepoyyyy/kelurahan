<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InnovationUpdate;

class InnovationUpdateMedia extends Model
{       use HasFactory;
    protected $table = 'innovation_update_media';
    protected $fillable = [
        'innovation_update_id',
        'file_path',
        'file_type'
    ];

    public function innovationUpdate()
    {
        return $this->belongsTo(InnovationUpdate::class);
    }
}
