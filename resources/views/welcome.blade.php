<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css','resources/js/app.js'])

        <title>Laravel</title>

      
    </head>
    <body class="font-sans antialiased white:bg-black black:text-white/50">
        <livewire:admin-login-form/>
        
    <script src="./node_modules/preline/dist/preline.js"></script>

    </body>
</html>
