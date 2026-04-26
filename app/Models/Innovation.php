<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Innovation extends Model
{
    use HasFactory;
    protected $table = 'innovations';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'start_date',
        'end_date'
    ];


     protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    public function updates()
{
    return $this->hasMany(InnovationUpdate::class, 'innovations_id'); // sesuaikan FK
}
public function getExcerptAttribute(): string
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->description), 120);
    }
public function getFormattedDateAttribute(): string
    {
        return Carbon::parse($this->created_at)->translatedFormat('d F Y');
    }
    /**
     * Ambil update terbaru (penting untuk UI)
     */
    public function latestUpdate()
    {
        return $this->hasOne(InnovationUpdate::class)->latestOfMany();
    }

}
