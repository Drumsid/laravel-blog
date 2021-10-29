<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Vocal;
use App\Models\OriginalSong;

class TestController extends Controller
{
    public function getSongs()
    {
        $categories = OriginalSong::with('song')->get();
        $song = OriginalSong::findOrFail(1);
        return $categories;
        return $song->song;
    }

    public function getVocals()
    {
        $posts = Vocal::with('song')->get();
        $post = Vocal::with('song')->findOrFail(5);
        // return $posts;
        return $post;
    }

    public function getPostsTags()
    {
        $post = Post::with('tags')->findOrFail(5);
        return $post;

        // $post = Post::findOrFail(7);
        // return $post->tags;
    }

    public function getTagsPosts()
    {
        $tag = Tag::with('posts')->findOrFail(6);
        return $tag;
    }
}
