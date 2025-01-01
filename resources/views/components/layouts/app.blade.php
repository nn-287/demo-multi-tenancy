<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4">
        {{ $slot }}
    </div>
    <div id="toast-container" class="fixed top-4 right-4 z-50"></div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>
    @stack('scripts')
</body>
</html>
