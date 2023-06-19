@extends('components.layout')

@include('components.nav')

@section('header')
    <h1>{{ $post->title }}</h1>
    <p>
        By <a href="/?authors={{ $post->author->username }}">{{ $post->author->name }}</a> in <a
            href="/?categories=/{{ $post->category->slug }}">{{ $post->category->name }}</a>.
    </p>
@endsection



@section('content')
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            <img src="/images/illustration-1.png" alt="" class="rounded-xl">

            <p class="mt-4 block text-gray-400 text-xs">
                Published
                <time>{{ $post->created_at->diffForHumans() }}</time>
            </p>

            <div class="flex items-center lg:justify-center text-sm mt-4">
                <img src="/images/lary-avatar.svg" alt="Lary avatar">
                <div class="ml-3 text-left">
                    <h5 class="font-bold"><a
                            href="/?authors={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-span-8">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="/"
                   class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>

                    Back to Posts
                </a>

                <div class="space-x-2">
                    <a href="/?categories={{ $post->category->slug }}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $post->category->name }}</a>

                </div>
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                {{ $post->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                {{ $post->body }}
            </div>
        </div>
    </article>

    <article>
        <div class="flex flex-col w-full m-6 mx-auto rounded-md bg-gray-100">
            <div class="flex justify-between p-4">
                <div class="flex-none">
                    <div>
                        <img src="https://source.unsplash.com/100x100/?portrait" alt=""
                             class="object-cover w-12 h-12 rounded-full dark:bg-gray-500">
                    </div>
                </div>
                <div class="grow">
                    <div class="px-4 space-y-2 ">
                        <h4 class="font-bold">Leroy Jenkins</h4>
                        <span class="text-xs">Posted 2 days ago</span>
                    </div>
                    <div class="p-4 space-y-2 text-sm">
                        <p>Vivamus sit amet turpis leo. Praesent varius eleifend elit, eu dictum lectus consequat
                            vitae. Etiam ut dolor id justo fringilla finibus.</p>
                        <p>Donec eget ultricies diam, eu molestie arcu. Etiam nec lacus eu mauris cursus venenatis.
                            Maecenas gravida urna vitae accumsan feugiat. Vestibulum commodo, ante sit urna purus
                            rutrum sem.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </article>


    <div class="lg:hidden mt-8">
        <a href="/"
           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path class="fill-current"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                    </path>
                </g>
            </svg>

            Back to Posts
        </a>
    </div>
@endsection



