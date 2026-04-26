<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Innovation;
use App\Models\InnovationUpdateMedia;
use Carbon\Carbon;

class InnovationUpdate extends Model
{
    use HasFactory;
    protected $table = 'innovation_updates';

    protected $fillable = [
            'innovations_id',
            'title',
            'description',
            'slug',
            'activity_date'
    ];



    public function innovation()
    {
        return $this->belongsTo(Innovation::class, 'innovations_id', 'id');
    }
    public function media()
    {
        return $this->hasMany(InnovationUpdateMedia::class);
    }

    public function getThumbnailAttribute()
    {
        return $this->media->first();
    }

    public function getGalleryAttribute()
    {
        return $this->media->slice(1);
    }

    public function getExcerptAttribute(): string
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->description), 120);
    }

    // public function getAllImagesAttribute()
    // {
    //     return $this->media
    //             ->map(fn($m) => asset('storage/' . $m->file_path))
    //             ->values()
    //             ->toArray();
    // }
    public function getAllImagesAttribute()
{
    return $this->media->map(fn($m) => [
        'url' => asset('storage/' . $m->file_path),
        'type' => $m->file_type, // tambah type
    ])->values()->toArray();
}
public function getFormattedDateAttribute(): string
    {
        return Carbon::parse($this->activity_date)->translatedFormat('d F Y');
    }
}

