@extends('layout.auth')

@section('title', 'Esqueceu a senha -')

@section('content')
<main>
  <article class="box-form">
    <div class="texts">
      <h1>Esqueceu a senha</h1>
      <p>Insira seu email para redefinir a senha</p>
    </div>
    <form action="{{ route('forgot.password.submit') }}" method="post">
      @csrf
      @method('POST')
      <div class="box-input">
        <label for="email">Endereço de e-mail:</label>
        <input class="form-input" type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
      </div>
      @if(session()->has('status'))
      <p class="info">{{ session('status') }}</p>
      @endif
      <button class="btn-submit" type="submit">Enviar</button>
    </form>
    <a href="{{ route('login') }}" class="forgot-password">Entrar no sistema</a>
  </article>
</main>
@endsection