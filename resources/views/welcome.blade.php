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
        <div class="hero bg-base-200 min-h-screen">
            <div class="hero-content text-center">
              <div class="max-w-md">
                <h1 class="text-5xl font-bold">Hello there</h1>
                <p class="py-6">
                  Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                  quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>              </div>
            </div>
          </div>      
    <script src="./node_modules/preline/dist/preline.js"></script>

    </body>
</html>
