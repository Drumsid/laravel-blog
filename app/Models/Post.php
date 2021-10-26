<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'thumbnail',
        'audio',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}");
        }
        return $image ? $image : null;
    }

    public static function uploadAudio(Request $request, $audio = null)
    {
        if ($request->hasFile('audio')) {
            if ($audio) {
                Storage::delete($audio);
            }
            $folder = date('Y-m-d');
            return $request->file('audio')->store("audio/{$folder}");
        }
        return $audio ? $audio : null;
    }

    public function getImage()
    {
        if (! $this->thumbnail) {
            return asset('no-image.jpg');
        }
        return asset("uploads/{$this->thumbnail}");
    }

    public function getAudio()
    {
        if (! $this->audio) {
            return null;
        }
        return asset("uploads/{$this->audio}");
    }
}
