<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="en-us">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="rating" content="general" />
    <meta name="description" content="Stay on course with road signs as your compass, guiding you safely through every turn!">
    <meta name="robots" content="index">
    <title>{{ $title ?? "Visual Angle Advertising & Printing"}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    @include('includes.nav')
    <main class="mt-24 mx-auto">

        {{-- Normal Blade Files --}}
        @if(Route::is('home_page'))
            @include('includes.pages.home')
        @endif
        {{-- Normal Blade Files --}}

        {{-- With Livewire Components --}}
        @if(Route::is('inquire_page'))
            <livewire:inquire-component />
        @endif

        @if(Route::is('contact_page'))
            <livewire:contact-component />
         @endif
        {{-- With Livewire Components --}}
        @include('includes.pages.partials.footer')

    </main>
    @livewireScripts
</body>
</html>
