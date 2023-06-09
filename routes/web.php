<?php

use App\Models\OldPost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $posts = OldPost::all();

//    $document = YamlFrontMatter::parseFile(resource_path('old_posts/first-post.html'));
//    ddd($document->body());

    return view('old_posts', [
//        'old_posts' => OldPost::all();
        'old_posts' => $posts
    ]);
});

Route::get('old_posts/{post}', function ($slug) {

    $post = OldPost::findOrFail($slug);

    return view('post', [
        'post' => $post
    ]);
});


