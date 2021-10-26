<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Vocal;
use App\Models\Tag;

class TestController extends Controller
{
    public function getSongs()
    {
        $categories = Song::with('vocals')->get();
        $category = Song::with('vocals')->findOrFail(2);
        // return $categories;
        return $category;
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
