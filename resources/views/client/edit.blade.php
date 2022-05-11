@extends('layout.site')

@section('title', 'Editar Cliente -')

@section('head')
<link rel="stylesheet" href="{{ asset('css/create-client.css') }}">
@endsection

@section('content')
<h2 class="title">Editar <strong>Cliente</strong></h2>

<form id="form-client" action="{{ route('client.update', [$client->id]) }}" method="post">
  @csrf
  @method('patch')
  <div class="box-inputs">
    <div class="mb-3">
      <label for="name" class="label">Nome</label>
      <input type="text" class="input" placeholder="Cliente" name="name" id="name"
        value="{{ old('name', $client->name) }}">
      @error('name')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="contact" class="label">Contato</label>
      <input type="text" class="input" placeholder="Contato" name="contact" id="contact"
        value="{{ old('contact', $client->contact) }}">
    </div>

    <div class="input-group">
      <div class="mb-3">
        <label for="type-cpf">Física</label>
        <input type="radio" name="type" id="type-cpf" value="FISICA" {{ old('type', $client->type) === 'FISICA' ?
        'checked' : '' }} >
      </div>
      <div class="mb-3">
        <label for="type-cnpj">Jurídica</label>
        <input type="radio" name="type" id="type-cnpj" value="JURIDICA" {{ old('type', $client->type) === 'JURIDICA' ?
        'checked' : '' }}>
      </div>
    </div>

    <div class="mb-3">
      <label for="doc" class="label">{{ old('type', $client->type) === 'FISICA' ? 'Cpf' : 'Cnpj'}}</label>
      <input type="text" class="input" placeholder="{{ old('type', $client->type) === 'FISICA' ? 'Cpf' : 'Cnpj'}}"
        name="doc" id="doc" value="{{ old('doc', $client->{'cpf/cnpj'}) }}">
      @error('doc')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="input-group">
      <div class="mb-3">
        <label for="interested-true">Interessado</label>
        <input type="radio" name="interested" id="interested-true" value="1" {{ old('interested', $client->interested)
        == '1' ?
        'checked' : '' }}>
      </div>
      <div class="mb-3">
        <label for="interested-false">Sem Interesse</label>
        <input type="radio" name="interested" id="interested-false" value="0" {{ old('interested', $client->interested)
        == '0' ?
        'checked' : '' }}>
      </div>
    </div>
  </div>

  <div class="box-inputs">
    <div class="input-group">
      <div class="mb-3 zip_code">
        <label for="zip_code" class="label">Cep</label>
        <input type="text" class="input" placeholder="Cep" name="address_zip_code" id="zip_code" maxlength="9"
          value="{{ old('address_zip_code', $client->address->zip_code) }}">
      </div>
      <div class="mb-3">
        <label for="number" class="label">Numero</label>
        <input type="text" class="input" placeholder="Numero" name="address_number" id="number"
          value="{{ old('address_number', $client->address->number) }}">
      </div>
    </div>

    <div class="input-group">
      <div class="mb-3 city">
        <label for="city" class="label">Cidade</label>
        <input type="text" class="input" placeholder="Cidade" name="address_city" id="city"
          value="{{ old('address_city', $client->address->city) }}">
      </div>
      <div class="mb-3 state">
        <label for="state" class="label">Estado</label>
        <input type="text" class="input" placeholder="Estado" name="address_state" id="state"
          value="{{ old('address_state', $client->address->state) }}">
      </div>
    </div>

    <div class="mb-3">
      <label for="street" class="label">Rua</label>
      <input type="text" class="input" placeholder="Rua" name="address_street" id="street"
        value="{{ old('address_street', $client->address->street) }}">
    </div>

    <div class="input-group">
      <div class="mb-3 district">
        <label for="district" class="label">Bairro</label>
        <input type="text" class="input" placeholder="Bairro" name="address_district" id="district"
          value="{{ old('address_district', $client->address->district) }}">
      </div>
      <div class="mb-3 complement">
        <label for="complement" class="label">Complemento</label>
        <input type="text" class="input" placeholder="Complemento" name="address_complement" id="complement"
          value="{{ old('address_complement', $client->address->complement) }}">
      </div>
    </div>
  </div>

  <div class="box-inputs">
    <div class="input-group">
      <p>Celular:</p>
      <div class="mb-3">
        <label for="cell-true">Sim</label>
        <input type="radio" name="info_cell" id="cell-true" value="1" {{ old('info_cell', $client->information->cell)
        == '1' ?
        'checked' : '' }}>
      </div>
      <div class="mb-3">
        <label for="cell-false">Nao</label>
        <input type="radio" name="info_cell" id="cell-false" value="0" {{ old('info_cell', $client->information->cell)
        == '0' ?
        'checked' : '' }}>
      </div>
    </div>

    <div class="line-radio cell {{ old('info_cell', $client->information->cell) == '1' ? 'show' : '' }}">
      <div class="input-group">
        <div class="mb-3">
          <label for="cell_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_cell_package" id="cell_package"
            value="{{ old('info_cell_package', $client->information->cell_package) }}">
        </div>
        <div class="mb-3">
          <label for="cell_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_cell_operator" id="cell_operator"
            value="{{ old('info_cell_operator', $client->information->cell_operator) }}">
        </div>
        <div class="mb-3">
          <label for="cell_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_cell_value" id="cell_value"
            value="{{ old('info_cell_value', $client->information->cell_value) }}">
        </div>
      </div>
    </div>

    <div class="input-group">
      <p>Net:</p>
      <div class="mb-3">
        <label for="net-true">Sim</label>
        <input type="radio" name="info_net" id="net-true" value="1" {{ old('info_net', $client->information->net)
        == '1' ?
        'checked' : '' }}>
      </div>
      <div class="mb-3">
        <label for="net-false">Nao</label>
        <input type="radio" name="info_net" id="net-false" value="0" {{ old('info_net', $client->information->net)
        == '0' ?
        'checked' : '' }}>
      </div>
    </div>

    <div class="line-radio net {{ old('info_net', $client->information->net) == '1' ? 'show' : '' }}">
      <div class="input-group">
        <div class="mb-3">
          <label for="net_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_net_package" id="net_package"
            value="{{ old('info_net_package', $client->information->net_package) }}">
        </div>
        <div class="mb-3">
          <label for="net_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_net_operator" id="net_operator"
            value="{{ old('info_net_operator', $client->information->net_operator) }}">
        </div>
        <div class="mb-3">
          <label for="net_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_net_value" id="net_value"
            value="{{ old('info_net_value', $client->information->net_value) }}">
        </div>
      </div>
    </div>

    <div class="input-group">
      <p>Telefone:</p>
      <div class="mb-3">
        <label for="telephone-true">Sim</label>
        <input type="radio" name="info_telephone" id="telephone-true" value="1" {{ old('info_telephone',
          $client->information->telephone)
        == '1' ?
        'checked' : '' }}>
      </div>
      <div class="mb-3">
        <label for="telephone-false">Nao</label>
        <input type="radio" name="info_telephone" id="telephone-false" value="0" {{ old('info_telephone',
          $client->information->telephone)
        == '0' ?
        'checked' : '' }}>
      </div>
    </div>

    <div class="line-radio telephone {{ old('info_telephone', $client->information->telephone) == '1' ? 'show' : '' }}">
      <div class="input-group">
        <div class="mb-3">
          <label for="telephone_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_telephone_package" id="telephone_package"
            value="{{ old('info_telephone_package', $client->information->telephone_package) }}">
        </div>
        <div class="mb-3">
          <label for="telephone_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_telephone_operator"
            id="telephone_operator"
            value="{{ old('info_telephone_operator', $client->information->telephone_operator) }}">
        </div>
        <div class="mb-3">
          <label for="telephone_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_telephone_value"
            id="telephone_value" value="{{ old('info_telephone_value', $client->information->telephone_value) }}">
        </div>
      </div>
    </div>

    <div class="input-group">
      <p>Tv:</p>
      <div class="mb-3">
        <label for="tv-true">Sim</label>
        <input type="radio" name="info_tv" id="tv-true" value="1" {{ old('info_tv', $client->information->tv)
        == '1' ?
        'checked' : '' }}>
      </div>
      <div class="mb-3">
        <label for="tv-false">Nao</label>
        <input type="radio" name="info_tv" id="tv-false" value="0" {{ old('info_tv', $client->information->tv)
        == '0' ?
        'checked' : '' }}>
      </div>
    </div>

    <div class="line-radio tv {{ old('info_tv', $client->information->tv) == '1' ? 'show' : '' }}">
      <div class="input-group">
        <div class="mb-3">
          <label for="tv_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_tv_package" id="tv_package"
            value="{{ old('info_tv_package', $client->information->tv_package) }}">
        </div>
        <div class="mb-3">
          <label for="tv_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_tv_operator" id="tv_operator"
            value="{{ old('info_tv_operator', $client->information->tv_operator) }}">
        </div>
        <div class="mb-3">
          <label for="tv_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_tv_value" id="tv_value"
            value="{{ old('info_tv_value', $client->information->tv_value) }}">
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label for="satisfaction" class="label">Satisfação</label>
      <input type="number" class="input" placeholder="0 à 10" name="info_satisfaction" id="satisfaction" min="0"
        max="10" value="{{ old('info_satisfaction', $client->information->satisfaction) }}">
    </div>

    <div class="input-group">
      <p>Trocaria de operadora:</p>
      <div class="mb-3">
        <label for="change_operator-true">Sim</label>
        <input type="radio" name="info_change_operator" id="change_operator-true" value="1" {{
          old('info_change_operator', $client->information->change_operator)
        == '1' ?
        'checked' : '' }}>
      </div>
      <div class="mb-3">
        <label for="change_operator-false">Nao</label>
        <input type="radio" name="info_change_operator" id="change_operator-false" value="0" {{
          old('info_change_operator', $client->information->change_operator)
        == '0' ?
        'checked' : '' }}>
      </div>
    </div>

    <div>
      <label for="info_observation" class="label">Observação</label>
      <textarea class="input" name="info_observation" placeholder="Observação" id="info_observation"
        rows="4">{{ old('info_observation', $client->information->observation) }}</textarea>
    </div>
  </div>

  <button class="btn btn-client" type="submit">Salvar</button>
</form>
@endsection

@section('javascript')
<script src="{{ asset('js/create-client.js') }}"></script>
<script>

</script>
@endsection