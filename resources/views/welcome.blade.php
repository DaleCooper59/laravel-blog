<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{mix('css/app.css')}}" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body>
       
        <div class="text-center h-screen my-auto container border p-8 text-3xl">
            Le blog de DUVINAGE Christopher, c'est par là ->  <a class="text-Cambridge_blue" href="{{route('articles.index')}}"> BLOG </a>
        </div>
        
           
        <script src="{{ asset('js/app.js')}}" defer></script>
    </body>
</html>
