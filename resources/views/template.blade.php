<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>title</title>
  
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  
</head>

<body>
  
  <div class="container mx-auto w-screen min-h-screen">
    
  @yield('h1')
  
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="{{ asset('js/custom.js') }}" type="text/js"></script>
</body>
</html>
