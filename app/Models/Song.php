<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Song extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'text',
        'tonica',
        'description',
        'dpm',
        'size',
        'form',
        'original_song',
    ];

    public function vocals()
    {
        return $this->hasMany(Vocal::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
