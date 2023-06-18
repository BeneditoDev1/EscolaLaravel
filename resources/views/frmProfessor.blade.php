@extends('template')

@section('conteudo')
  <h1>Formulário de Professor</h1>

  <form action="{{ $professor->id ? route('professor.atualizar', $professor->id) : route('professor.salvar') }}" method="POST" enctype="multipart/form-data">
    

    @if($professor->id)
      @method('PUT')
    @endif
    @csrf
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ $professor->nome }}" required>
    </div>

    <div class="mb-3">
      <label for="cpf" class="form-label">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $professor->cpf }}" required>
    </div>

    <div class="form-group">
      <label for="sexo">Sexo:</label>
      <select name="sexo" class="form-control" required>
        <option value="">Selecione</option>
        <option value="M" @if ($professor->sexo == 'M') selected @endif>Masculino</option>
        <option value="F" @if ($professor->sexo == 'F') selected @endif>Feminino</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="codigo_materia" class="form-label">Código Matéria</label>
      <input type="number" class="form-control" id="codigo_materia" name="codigo_materia" value="{{ $professor->codigo_materia }}" required>
    </div>

    <div class="form-group">
      <label for="arquivo">Imagem:</label>
      <input type="file" class="form-control" id="arquivo" name="arquivo" accept="image/*">
    </div>

      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="{{ route('professor.listar') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
