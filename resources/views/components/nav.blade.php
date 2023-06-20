
<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex">
        <a href="/" class="text-xs font-bold uppercase hover:opacity-50 mr-4">Home Page</a>

            <div class="flex flex-col items-center">
        @auth
                <span class="text-xs font-bold uppercase italic">Welcome, {{ auth()->user()->name }}</span>
                    <form action="/logout" method="post" class="text-xs font-bold uppercase hover:opacity-50 border-t border-gray-900/10 pt-1">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>

        @else
            <a href="/register" class="text-xs font-bold uppercase hover:opacity-50">Register</a>
            <a href="/login" class="text-xs font-bold uppercase hover:opacity-50">Log in</a>
        @endauth
            </div>

{{--        @guest        SAME AS: @if(!auth()->check())--}}

{{--        <a href="/register" class="text-xs font-bold uppercase hover:opacity-50">Register</a>--}}
{{--        @endguest--}}

        <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>
