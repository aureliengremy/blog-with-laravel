<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'thumbnail'=>'required|image',
            'slug'=> ['required', Rule::unique('posts', 'slug')],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories', 'id')],
        ]);

//        $post = new Post($attributes);
//        $post->user_id = auth()->id();
//
//        $post->save();

//        auth()->user()->posts()->create($attributes);

//        Post::create([
//            'user_id' => auth()->id(),
//            $attributes
//        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }
}
