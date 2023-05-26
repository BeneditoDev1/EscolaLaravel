@extends('template')

@section('conteudo')
  <h1>Formulário de Matéria</h1>

  <form action="{{ $action }}" method="POST">
    @csrf

    <input type="hidden" name="id" value="{{ $materia->id }}">

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" value="{{ $materia->nome }}" required>
    </div>

    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <textarea class="form-control" name="descricao" rows="3" required>{{ $materia->descricao }}</textarea>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
@endsection
