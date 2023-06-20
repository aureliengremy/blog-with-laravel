@auth
    <section class="">
        <form action="/posts/{{ $post->slug }}/comments" method="post" class="border border-gray-200 p-6 rounded-xl mt-12">
            @csrf
            <div class="col-span-full">
                <h3 for="body" class="leading-6 text-gray-900 py-4">You want to comment this article ?</h3>
                <div class="mt-2">
                    <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-full px-6 bg-indigo-600 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send</button>
            </div>
        </form>
    </section>
@else
    <div class="border border-gray-200 p-6 rounded-xl mt-12">
        <h3 class="text-center">
            <a href="/login" class="text-blue-400 hover:underline">Log in </a>
            or
            <a href="/register" class="text-blue-400 hover:underline">register</a>
            to leave a comment 💬</h3>
    </div>
@endauth

<section class="my-12">
    @foreach($post->comments as $comment)
        <div class="flex flex-col w-full m-6 mx-auto rounded-md bg-gray-100">
            <div class="flex p-4">
                <div class="flex-none">
                    <div>
                        <img src="https://source.unsplash.com/100x100/?portrait/{{ $comment->user_id }}" alt=""
                             class="object-cover w-12 h-12 rounded-full dark:bg-gray-500">
                    </div>
                </div>
                <div class="grow">
                    <div class="px-4 space-y-2 ">
                        <h4 class="font-bold">{{ $comment->author->name }}</h4>
                        <span class="text-xs">Posted
                            <time>{{ $comment->created_at->diffForHumans() }}</time></span>
                    </div>
                    <div class="p-4 space-y-2 text-sm">
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
</section>
