<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    @vite('resources/css/app.css')
    <title>
        Book Reviews
    </title>
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    />
</head>
<body class="w-full h-full white:bg-gray-100 dark:bg-gray-900">
    <div class="w-4/5 mx-auto mb-5">
        <div class="text-center pt-20">
            <h1 class="text-3xl white:text-gray-700 dark:text-white">
               @yield('title')
            </h1>
            <hr class="border border-1 border-gray-500 mt-10">
        </div>
    </div>