@extends('layout')

@section('header')
    <h1>All Posts</h1>
@endsection
{{--    <a href="/old_posts/first-post">First OldPost</a>--}}
{{--    <a href="/old_posts/second-post">Second OldPost</a>--}}
{{--    <a href="/old_posts/third-post">Third OldPost</a>--}}

@section('content')
    @foreach ($posts as $post)
{{--        <div class="post">--}}
{{--            <a href="/old_posts/<?= $post[0] ?>">--}}
{{--                <?= $post[0] ?>--}}
{{--            </a>--}}

{{--                <?= $post[1] ?>--}}

{{--        </div>--}}
        <div class="post">
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
            <p>{{ $post->excerpt }}</p>
        </div>
    @endforeach
@endsection
