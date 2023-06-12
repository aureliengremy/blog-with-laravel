@extends('layout')

@section('header')
    <h1>All Posts</h1>
@endsection

@section('content')
    @foreach ($posts as $post)

        <div class="post">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

            <p>{{ $post->excerpt }}</p>
        </div>
    @endforeach
@endsection
