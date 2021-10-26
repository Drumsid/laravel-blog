<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Http\Requests\VocalRequest;
use Illuminate\Support\Facades\Storage;

class Vocal extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'vocal',
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

    public static function uploadAudio(VocalRequest $request, $vocal = null)
    {
        if ($request->hasFile('vocal')) {
            if ($vocal) {
                Storage::delete($vocal);
            }
            $folder = date('Y-m-d');
            return $request->file('vocal')->store("vocal/{$folder}");
        }
        return $vocal ? $vocal : null;
    }

    public function getAudio()
    {
        if (! $this->vocal) {
            return null;
        }
        return asset("uploads/{$this->vocal}");
    }
}
