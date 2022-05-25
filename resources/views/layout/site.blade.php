<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/default.css') }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @yield('head')
  <script>
    const BASE_URL = '{{ env('APP_URL') }}'
  </script>
  <title> @yield('title') Gerenciador de Clientes</title>
</head>

<body>
  <div class="container">
    <x-sidebar />

    <main>
      <header>
        <button type="button" class="menu">
          <span class="menu-line"></span>
          <span class="menu-line"></span>
          <span class="menu-line"></span>
        </button>
        <h2 class="greetings">
          Bem Vindo de volta <strong class="text-body">{{ Auth::user()->name }}</strong>
          <span class="greetings-emoji">👋</span>
        </h2>
        @yield('header')
      </header>

      @yield('content')
    </main>
  </div>

  <script src="{{ mix('js/default.js') }}"></script>
  @yield('javascript')
</body>

</html>
