<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Preline CSS -->
        <link href="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        
        @livewireStyles
    </head>
     
    <body >
        <div class="container mx-auto p-4">
            {{ $slot }}
        </div>

        <!-- Preline Toast Container -->
        <div id="toast-container" class="fixed top-4 right-4 z-50"></div>

        @livewireScripts
        
        <!-- Preline JS from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>


        
        @stack('scripts')
    </body>
</html>


