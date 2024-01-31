<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="en-us">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="rating" content="general" />
    <meta name="description" content="This is an example of a meta description. Your meta description will often show up in search results.">
    <meta name="robots" content="index">
    <meta http-equiv="content-language” content="en-us">
    <title>{{ $title ?? "Visual Angle Advertising Company"}}</title>
    @livewireStyles
    @vite(['./resources/css/app.css','./resources/js/app.js'])
</head>
<body>
    @include('includes.nav')
    <main class="container mt-24 mx-auto">
        {{-- If there is livewire component --}}
        {{ $slot ?? "" }}
        {{-- If there is livewire component --}}

        {{-- Normal Blade Files --}}
        @if(Route::is('home_page'))
            @include('includes.pages.home')
        @endif
        @if(Route::is('about_page'))
            @include('includes.pages.about')
        @endif
        {{-- Normal Blade Files --}}
    </main>
    @livewireScripts
</body>
</html>
