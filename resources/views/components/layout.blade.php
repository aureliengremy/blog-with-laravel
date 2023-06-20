<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif" class="m-5">
<section class="px-6 py-8">
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @yield('content')
    </main>
        @extends('components.footer')
</section>
@if(session()->has('success'))
    <div class="fixed bottom-5 right-2 py-2 px-4 rounded bg-green-400">
        <p>{{ session()->get('success') }}</p>
    </div>
@endif

</body>
</html>
