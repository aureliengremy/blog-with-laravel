@extends('layout')

@section('header')
    <h1>All Posts</h1>
@endsection

@section('content')
    @foreach ($posts as $post)

        <div class="post">
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
            <p>{{ $post->excerpt }}</p>
        </div>
    @endforeach
@endsection
