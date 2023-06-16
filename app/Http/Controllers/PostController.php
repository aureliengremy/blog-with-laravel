<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // "filter" is a Scope method from the Model Post
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
        $categories = Category::all();

        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
