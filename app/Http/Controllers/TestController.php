<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class TestController extends Controller
{
    public function getCategories()
    {
        $categories = Category::with('posts')->get();
        $category = Category::with('posts')->findOrFail(5);
        return $categories;
        return $category;
    }

    public function getPosts()
    {
        $posts = Post::with('category')->get();
        $post = Post::with('category')->findOrFail(5);
        return $posts;
        return $post;
    }

    public function getPostsTags()
    {
        return Post::with('tags')->get();
    }
}
