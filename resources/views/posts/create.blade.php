@extends('components.layout')

@include('components.nav')



@section('content')
    <form action="/admin/posts" method="post" class="border border-gray-200 p-6 rounded-xl mt-12" enctype="multipart/form-data">
        @csrf
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input type="text" name="title" id="title" autocomplete="given-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required value="{{ old('title') }}">
                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                <div class="mt-2">
                    <input type="text" name="slug" id="slug" autocomplete="given-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required value="{{ old('slug') }}">
                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Thumbnail</label>
                <div class="mt-2">
                    <input type="file" name="thumbnail" id="thumbnail" autocomplete="given-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           required value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{--            <div class="sm:col-span-4">--}}
            {{--                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>--}}
            {{--                <div class="mt-2">--}}
            {{--                    <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="col-span-full">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Excerpt</label>
                <div class="mt-2">
                    <textarea id="excerpt" name="excerpt" rows="3"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                              required value="{{ old('excerpt') }}"></textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-span-full">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                <div class="mt-2">
                    <textarea id="body" name="body" rows="3"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                              required value="{{ old('body') }}"></textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-span-full">
                <Label class="text-sm font-semibold leading-6 text-gray-900" for="category">Category :</Label>
                <select name="category_id" id="category">
                    <div class="mt-6 space-y-6">
                        <div class="flex flex-wrap items-center gap-x-4">
                            @php
                                $categories = \App\Models\Category::all();
                            @endphp
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    class="p-2"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                            @endforeach
                            @error('category')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </select>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                        class="rounded-full px-6 bg-indigo-600 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Publish
                </button>
            </div>
    </form>
@endsection



