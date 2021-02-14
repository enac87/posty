<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <title>Posty</title>
  </head>
  <body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between flex-wrap items-center mb-6">
      <ul class="flex items-center">
        <li><a href="{{ route('home') }}" class="p-3">Home</a></li>
        @auth
        <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
        @endauth
        <li><a href="{{ route('posts') }}" class="p-3">Post</a></li>
      </ul>
      <!-- separator comment -->
      <ul class="flex items-center">
        @auth
        <li><a href="#" class="p-3">{{ Auth::user()->name }}</a></li>
        <li>
          <form action="{{ route('logout') }}" method="post" class="p-3 inline">
            @csrf
            <button type="submit">Logout</button>
          </form>
        </li>
        @endauth

        @guest
        <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
        <li><a href="{{ route('register') }}" class="p-3">Register</a></li>
        @endguest
      </ul>
    </nav>
    
    @yield('content')

    @livewireScripts
  </body>
</html>