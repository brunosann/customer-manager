<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <title>Entrar - Gerenciador de Clientes</title>
</head>

<body>
  <main>
    <article class="box-form">
      <div class="texts">
        <h1>Bem vindo de volta</h1>
        <p>Insira suas credenciais para acessar sua conta</p>
      </div>
      <form action="{{ route('login.submit') }}" method="post">
        @csrf
        @method('POST')
        <div class="box-input">
          <label for="email">Endereço de e-mail:</label>
          <input class="form-input" type="email" name="email" id="email" value="{{ old('email') }}">
          @error('email')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>
        <div class="box-input">
          <label for="password">Senha:</label>
          <input class="form-input" type="password" name="password" id="password">
          @error('password')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>
        @error('authError')
        <p class="error">{{ $message }}</p>
        @enderror
        <button class="btn-submit" type="submit">Entrar</button>
      </form>
    </article>
    <p class="text-register">
      <span>Deseja uma conta?</span>
      <a class="link-register" href="mailto:contato@devteixeira.com.br">contato@devteixeira.com.br</a>
    </p>
  </main>
</body>

</html>