<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Laravel App</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">    
    <script defer src="resources\js\login.js"></script>
    
  </head>
  <body class="bg-gray-100 text-gray-800">

    @if(auth()->check())
      <nav class="flex py-5 bg-indigo-500 text-white">
  
        <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">

          <li class="mx-8">
            <p class="text-xl">Usuario: <b>{{ auth()->user()->name }}</b></p>
          </li>
          <li>
            <a href="{{ route('login.destroy') }}" class="font-bold
            py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Log Out</a>
          </li>

        </ul>

      </nav>
    @endif

    @yield('content')
    @yield('scripts')


  </body>
</html>