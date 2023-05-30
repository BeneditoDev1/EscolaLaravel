@extends('template')

@section('conteudo')
  <h1>Formulário de Matéria</h1>

  <form action="{{ $materia->id ? route('materia.atualizar', $materia->id) : route('materia.salvar')  }}" method="POST">
    @csrf
    @if($materia->id)
      @method('PUT')
    @endif

    <input type="hidden" name="id" value="{{ $materia->id }}">

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" value="{{ $materia->nome }}" required>
    </div>

    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <textarea class="form-control" name="descricao" rows="3" required>{{ $materia->descricao }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('materia.listar') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
