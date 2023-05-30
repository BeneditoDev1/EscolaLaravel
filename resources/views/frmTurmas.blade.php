@extends('template')

@section('conteudo')
  <h1>Formulário de Turma</h1>

  <form action="{{  $turma->id ? route('turma.atualizar', $turma->id) : route('turma.salvar')}}" method="POST">
    @csrf

    @if($turma->id)
      @method('PUT')
    @endif

    <input type="hidden" name="id" value="{{ $turma->id }}">

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" value="{{ $turma->nome }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('turma.listar') }}" class="btn btn-secondary">Cancelar</a>

  </form>
@endsection