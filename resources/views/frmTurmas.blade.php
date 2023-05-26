@extends('template')

@section('conteudo')
  <h1>Formulário de Turma</h1>

  <form action="{{ $action }}" method="POST">
    @csrf

    <input type="hidden" name="id" value="{{ $turma->id }}">

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" value="{{ $turma->nome }}" required>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
@endsection
