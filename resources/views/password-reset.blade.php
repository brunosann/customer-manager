@extends('layout.auth')

@section('title', 'Redefinir senha -')

@section('content')
<main>
  <article class="box-form">
    <div class="texts">
      <h1>Redefinir senha</h1>
    </div>
    <form action="{{ route('password.reset.submit') }}" method="post">
      @csrf
      @method('POST')
      <div class="box-input">
        <label for="password">Senha:</label>
        <input class="form-input" type="password" name="password" id="password">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
      </div>
      <div class="box-input">
        <label for="password_confirmation">Senha de confirmação:</label>
        <input class="form-input" type="password" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
        <p class="error">{{ $message }}</p>
        @enderror
      </div>
      @if(session()->has('status'))
      <p class="info">{{ session('status') }}</p>
      @endif
      <input type="hidden" name="token" value="{{ old('token', $token) }}">
      <button class="btn-submit" type="submit">Salvar</button>
    </form>
    <a href="{{ route('login') }}" class="forgot-password">Entrar no sistema</a>
  </article>
</main>
@endsection