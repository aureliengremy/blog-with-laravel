@extends('layout')

@section('header')
    <h1>{{ $post->title }}</h1>
@endsection

@section('content')

    <div class="post">
        <p>{{ $post->body }}</p>
    </div>


    <a href="/">Back</a>
@endsection

