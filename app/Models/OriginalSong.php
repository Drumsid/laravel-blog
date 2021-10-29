<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Http\Requests\OriginalSongRequest;
use Illuminate\Support\Facades\Storage;

class OriginalSong extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'song',
        'song_id',
        'song_name',
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

    public static function uploadAudio(OriginalSongRequest $request, $originalsong = null)
    {
        if ($request->hasFile('song_name')) {
            if ($originalsong) {
                Storage::delete($originalsong);
            }
            $folder = date('Y-m-d');
            return $request->file('song_name')->store("originalsong/{$folder}");
        }
        return $vocal ? $vocal : null;
    }

    public function getAudio()
    {
        if (! $this->song_name) {
            return null;
        }
        return asset("uploads/{$this->song_name}");
    }
}
