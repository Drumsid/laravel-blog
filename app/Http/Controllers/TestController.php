<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Vocal;
use App\Models\OriginalSong;
use App\Models\Tutorial;

class TestController extends Controller
{
    public function getTest()
    {
        $tutorials = Tutorial::with('song')->get();
        return $tutorials;
    }

    public function getSong()
    {
        $songs = Song::with('tutorials')->get();
        return $songs;
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
