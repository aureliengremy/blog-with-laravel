@extends('layout')

@section('header')
    <h1>{{ $post->title }}</h1>
    <p>
        By <a href="#">Author name</a> in <a
            href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> category.
    </p>
@endsection

@section('content')

    <div class="post">
        <p>{{ $post->body }}</p>
    </div>


    <a href="/" style="display: block;margin-top: 10px;">Back</a>
@endsection

