@extends('template')

@section('conteudo')
  <h1>Cadastro de Aluno</h1>
  <form action="{{url('aluno/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly class="form-control" readonly type="text" name="id" value="{{$aluno->id}}">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input class="form-control" type="text" name="nome" value="{{$aluno->nome}}">
    </div>
    <div class="mb-3">
      <label for="cpf" class="form-label">CPF</label>
      <input class="form-control" type="text" name="cpf" value="{{$aluno->cpf}}">
    </div>
    <div class="mb-3">
    <label for="id" class="form-label">Sexo</label>
    <input class="form-control" type="text" name="sexo" value="<?php echo isset($aluno['sexo']) ? $aluno['sexo'] : ''; ?>">
  </div>
  <div class="mb-3">
    <label for="autor" class="form-label">Codigo da Turma</label>
    <select class="form-select" name="codigo_turma" >
      <?php
        foreach ($turmas as $turma) {
          $selected = isset($aluno['turma_id']) && $turma['id']==$aluno['turma_id']?'selected':'';
          echo "<option $selected value='{$turma['id']}'>{$turma['nome']}</option>";
        }
       ?>
    </select>
  <div>  
  <div class="mb-3">
    <label for="autor" class="form-label">Codigo da Materia</label>
    <select class="form-select" name="codigo_materia" >
      <?php
        foreach ($materias as $materia) {
          $selected = isset($aluno['materia_id']) && $materia['id']==$aluno['materia_id']?'selected':'';
          echo "<option $selected value='{$materia['id']}'>{$materia['nome']}</option>";
        }
       ?>
    </select>
    <div class="mb-3">
      <label for="arquivo" class="form-label">Figura</label>
      <input class="form-control" type="file" name="arquivo" accept="image/*">
    </div>


    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
  </form>
@endsection