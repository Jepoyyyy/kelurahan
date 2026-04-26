<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class news extends Model
{
    use HasFactory;

     protected $table = 'newss';
    protected $fillable = [
        'title',
        'picture',
        'description',
        'views'
    ];
    public function getExcerptAttribute(): string
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->description), 120);
    }
    public function getFormattedDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->translatedFormat('d F Y');
    }
}


