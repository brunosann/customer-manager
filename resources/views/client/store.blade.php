@extends('layout.site')

@section('title', 'Novo Cliente -')

@section('head')
<link rel="stylesheet" href="{{ mix('css/create-client.css') }}">
@endsection

@section('content')
<h2 class="title">Cadastrar <strong>Cliente</strong></h2>

<form id="form-client" action="{{ route('client.store') }}" method="post">
  @csrf
  <div class="box-inputs">
    <div class="mb-3">
      <label for="name" class="label">Nome</label>
      <input type="text" class="input" placeholder="Cliente" name="name" id="name" value="{{ old('name') }}">
      @error('name')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="contact" class="label">Contato</label>
      <input type="text" class="input" placeholder="Contato" name="contact" id="contact">
    </div>

    <div class="input-group">
      <div class="mb-3">
        <label for="type-cpf">Física</label>
        <input type="radio" name="type" id="type-cpf" value="FISICA" checked>
      </div>
      <div class="mb-3">
        <label for="type-cnpj">Jurídica</label>
        <input type="radio" name="type" id="type-cnpj" value="JURIDICA">
      </div>
    </div>

    <div class="mb-3">
      <label for="doc" class="label">Cpf</label>
      <input type="text" class="input" placeholder="Cpf" name="doc" id="doc" value="{{ old('doc') }}">
      @error('doc')
      <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="input-group">
      <div class="mb-3">
        <label for="interested-true">Interessado</label>
        <input type="radio" name="interested" id="interested-true" value="1">
      </div>
      <div class="mb-3">
        <label for="interested-false">Sem Interesse</label>
        <input type="radio" name="interested" id="interested-false" value="0" checked>
      </div>
    </div>
  </div>

  <div class="box-inputs">
    <div class="input-group">
      <div class="mb-3 zip_code">
        <label for="zip_code" class="label">Cep</label>
        <input type="text" class="input" placeholder="Cep" name="address_zip_code" id="zip_code" maxlength="9">
      </div>
      <div class="mb-3">
        <label for="number" class="label">Numero</label>
        <input type="text" class="input" placeholder="Numero" name="address_number" id="number">
      </div>
    </div>

    <div class="input-group">
      <div class="mb-3 city">
        <label for="city" class="label">Cidade</label>
        <input type="text" class="input" placeholder="Cidade" name="address_city" id="city">
      </div>
      <div class="mb-3 state">
        <label for="state" class="label">Estado</label>
        <input type="text" class="input" placeholder="Estado" name="address_state" id="state">
      </div>
    </div>

    <div class="mb-3">
      <label for="street" class="label">Rua</label>
      <input type="text" class="input" placeholder="Rua" name="address_street" id="street">
    </div>

    <div class="input-group">
      <div class="mb-3 district">
        <label for="district" class="label">Bairro</label>
        <input type="text" class="input" placeholder="Bairro" name="address_district" id="district">
      </div>
      <div class="mb-3 complement">
        <label for="complement" class="label">Complemento</label>
        <input type="text" class="input" placeholder="Complemento" name="address_complement" id="complement">
      </div>
    </div>
  </div>

  <div class="box-inputs">
    <div class="input-group">
      <p>Celular:</p>
      <div class="mb-3">
        <label for="cell-true">Sim</label>
        <input type="radio" name="info_cell" id="cell-true" value="1">
      </div>
      <div class="mb-3">
        <label for="cell-false">Nao</label>
        <input type="radio" name="info_cell" id="cell-false" value="0" checked>
      </div>
    </div>

    <div class="line-radio cell">
      <div class="input-group">
        <div class="mb-3">
          <label for="cell_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_cell_package" id="cell_package">
        </div>
        <div class="mb-3">
          <label for="cell_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_cell_operator" id="cell_operator">
        </div>
        <div class="mb-3">
          <label for="cell_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_cell_value" id="cell_value">
        </div>
      </div>
    </div>

    <div class="input-group">
      <p>Net:</p>
      <div class="mb-3">
        <label for="net-true">Sim</label>
        <input type="radio" name="info_net" id="net-true" value="1">
      </div>
      <div class="mb-3">
        <label for="net-false">Nao</label>
        <input type="radio" name="info_net" id="net-false" value="0" checked>
      </div>
    </div>

    <div class="line-radio net">
      <div class="input-group">
        <div class="mb-3">
          <label for="net_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_net_package" id="net_package">
        </div>
        <div class="mb-3">
          <label for="net_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_net_operator" id="net_operator">
        </div>
        <div class="mb-3">
          <label for="net_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_net_value" id="net_value">
        </div>
      </div>
    </div>

    <div class="input-group">
      <p>Telefone:</p>
      <div class="mb-3">
        <label for="telephone-true">Sim</label>
        <input type="radio" name="info_telephone" id="telephone-true" value="1">
      </div>
      <div class="mb-3">
        <label for="telephone-false">Nao</label>
        <input type="radio" name="info_telephone" id="telephone-false" value="0" checked>
      </div>
    </div>

    <div class="line-radio telephone">
      <div class="input-group">
        <div class="mb-3">
          <label for="telephone_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_telephone_package" id="telephone_package">
        </div>
        <div class="mb-3">
          <label for="telephone_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_telephone_operator"
            id="telephone_operator">
        </div>
        <div class="mb-3">
          <label for="telephone_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_telephone_value"
            id="telephone_value">
        </div>
      </div>
    </div>

    <div class="input-group">
      <p>Tv:</p>
      <div class="mb-3">
        <label for="tv-true">Sim</label>
        <input type="radio" name="info_tv" id="tv-true" value="1">
      </div>
      <div class="mb-3">
        <label for="tv-false">Nao</label>
        <input type="radio" name="info_tv" id="tv-false" value="0" checked>
      </div>
    </div>

    <div class="line-radio tv">
      <div class="input-group">
        <div class="mb-3">
          <label for="tv_package" class="label">Pacote</label>
          <input type="text" class="input" placeholder="Pacote" name="info_tv_package" id="tv_package">
        </div>
        <div class="mb-3">
          <label for="tv_operator" class="label">Operadora</label>
          <input type="text" class="input" placeholder="Operadora" name="info_tv_operator" id="tv_operator">
        </div>
        <div class="mb-3">
          <label for="tv_value" class="label">Valor</label>
          <input type="number" step="any" class="input" placeholder="Valor" name="info_tv_value" id="tv_value">
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label for="satisfaction" class="label">Satisfação</label>
      <input type="number" class="input" placeholder="0 à 10" name="info_satisfaction" id="satisfaction" min="0"
        max="10">
    </div>

    <div class="input-group">
      <p>Trocaria de operadora:</p>
      <div class="mb-3">
        <label for="change_operator-true">Sim</label>
        <input type="radio" name="info_change_operator" id="change_operator-true" value="1">
      </div>
      <div class="mb-3">
        <label for="change_operator-false">Nao</label>
        <input type="radio" name="info_change_operator" id="change_operator-false" value="0" checked>
      </div>
    </div>

    <div>
      <label for="info_observation" class="label">Observação</label>
      <textarea class="input" name="info_observation" placeholder="Observação" id="info_observation"
        rows="4"></textarea>
    </div>
  </div>

  <button class="btn btn-client" type="submit">Salvar</button>
</form>
@endsection

@section('javascript')
<script src="{{ mix('js/create-client.js') }}"></script>
<script>

</script>
@endsection