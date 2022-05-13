@extends('layout.site')

@section('content')
<header>
  <button type="button" class="menu">
    <span class="menu-line"></span>
    <span class="menu-line"></span>
    <span class="menu-line"></span>
  </button>
  <h2 class="greetings">
    Bem Vindo de volta <strong class="text-body">Denise</strong>
    <span class="greetings-emoji">👋</span>
  </h2>
  <form id="form-search" method="GET">
    <div class="box-search">
      <input type="search" name="client" class="input-search" placeholder="Buscar cliente..."
        value="{{ Request::input('client') }}">
      <button type="submit" class="btn-search">
        <img src="{{ asset('images/search.png') }}" alt="busca" title="busca">
      </button>
    </div>
  </form>
</header>

<form id="form-filters" method="GET">
  <div class="bg-gray-filters">
    <h3 class="text-body">Filtrar por:</h3>
    <div class="box-filters">
      <label class="label-filter">
        <input type="checkbox" id="sold" name="sold" value="1">
        <span>Vendidos</span>
      </label>
      <label class="label-filter">
        <input type="checkbox" id="interested" name="interested" {{ Request::has('interested') ? 'checked' : '' }}>
        <span>Interessados</span>
      </label>
    </div>
    <div class="box-filters">
      <label class="label-filter">
        <input type="radio" name="date" id="day" value="day" {{ !Request::has('date') || Request::has('date')=='day'
          ? 'checked' : '' }}>
        <span>Hoje</span>
      </label>
      <label class="label-filter">
        <input type="radio" name="date" id="week" value="week" {{ Request::input('date')=='week' ? 'checked' : '' }}>
        <span>Essa Semana</span>
      </label>
      <label class="label-filter">
        <input type="radio" name="date" id="month" value="month" {{ Request::input('date')=='month' ? 'checked' : '' }}>
        <span>Mês</span>
      </label>
    </div>
    <div class="line-radio {{ Request::input('date') == 'month' ? 'box-filters show' : '' }}">
      <input type="month" name="month" id="filter-month" value="{{ Request::input('month') }}">
    </div>
  </div>
  <button type="submit" class="btn btn-filters">Filtrar</button>
</form>

<section id="clients">
  <article class="box-title">
    <div class="title">
      <h2 class="text-body">Clientes</h2>
      <span class="date">Março de 2022</span>
    </div>
    <a href="{{ route('client.create') }}" class="btn btn-clients">Novo +</a>
  </article>

  <ul class="list">
    <li class="list-head">
      <span>Nome</span>
      <span>Telefone</span>
      <span>CPF/CNPJ</span>
      <span>Ações</span>
    </li>

    @foreach ($clients as $client)
    <li class="list-item">
      <p class="value">{{ $client->name }}</p>
      <p class="value">{{ $client->contact }}</p>
      <p class="value">{{ $client->{'cpf/cnpj'} }}</p>
      <div class="actions">
        <a href="{{ route('client.edit', [$client->id]) }}" class="btn-list">
          <img src="{{ asset('images/edit.png') }}" alt="editar" title="editar">
        </a>
        <button type="button" class="btn-list">
          <img src="{{ asset('images/trash.png') }}" alt="apagar" title="apagar">
        </button>
      </div>
    </li>
    @endforeach
  </ul>
  {{ $clients->links('components.pagination') }}
</section>

@endsection

@section('javascript')
<script src="{{ asset('js/app.js') }}"></script>
@endsection