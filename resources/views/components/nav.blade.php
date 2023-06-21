<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">
        <a href="/" class="text-xs font-bold uppercase hover:opacity-50 mr-4">Home Page</a>

        <div class="flex flex-col items-center">
            @auth

                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="relative hover:opacity-50">
                        <p class="text-xs font-bold uppercase italic">Welcome, {{ auth()->user()->name }}</p>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                    <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
                        <a href="/admin/posts/create" class="text-xs text-center font-bold uppercase block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">Create a post</a>
                        <a href="/admin/dashboard" class="text-xs text-center font-bold uppercase block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">Dashboard</a>
                        <form action="/logout" method="post"
                              class="mb-0">
                            @csrf
                            <button type="submit" class="w-full text-xs font-bold uppercase block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">Log out</button>
                        </form>
                    </div>
                </div>

            @else
                <a href="/register" class="text-xs font-bold uppercase hover:opacity-50">Register</a>
                <a href="/login" class="text-xs font-bold uppercase hover:opacity-50">Log in</a>
            @endauth
        </div>


        {{--        @guest        SAME AS: @if(!auth()->check())--}}

        {{--        <a href="/register" class="text-xs font-bold uppercase hover:opacity-50">Register</a>--}}
        {{--        @endguest--}}

        <a href="#newsletter"
           class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>
