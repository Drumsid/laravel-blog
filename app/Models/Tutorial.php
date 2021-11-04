<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tutorial extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'link',
        'iframe',
        'thumbnail',
        'description',
        'song_id',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
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
