@extends('template')

@section('conteudo')
  <h1>Formulário de Professor</h1>

  <form action="{{ $professor->id ? route('professor.atualizar', $professor->id) : route('professor.salvar') }}" method="POST">
    @csrf

    @if($professor->id)
      @method('PUT')
    @endif

    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ $professor->nome }}" required>
    </div>

    <div class="mb-3">
      <label for="cpf" class="form-label">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $professor->cpf }}" required>
    </div>

    <div class="mb-3">
      <label for="sexo" class="form-label">Sexo</label>
      <input type="text" class="form-control" id="sexo" name="sexo" value="{{ $professor->sexo }}" required>
    </div>

    <div class="mb-3">
      <label for="codigo_materia" class="form-label">Código Matéria</label>
      <input type="number" class="form-control" id="codigo_materia" name="codigo_materia" value="{{ $professor->codigo_materia }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('professor.listar') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
