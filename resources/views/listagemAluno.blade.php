@extends('template')

@section('conteudo')
  <h1>Listagem de Alunos</h1>
  <a href="{{ route('aluno.novo') }}" class="btn btn-primary">Novo Aluno</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Imagem</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Sexo</th>
        <th>Código Turma</th>
        <th>Código Matéria</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody> 
      @foreach($alunos as $aluno)
        <tr>
          <td>{{ $aluno->id }}</td>
          <td>
            @if ($aluno->imagem != "")
              <img style="width: 50px;" src="{{ asset('storage/imagens/' . $aluno->imagem) }}">
            @endif
          </td>
          <td>{{ $aluno->nome }}</td>
          <td>{{ $aluno->cpf }}</td>
          <td>{{ $aluno->sexo }}</td>
          <td>{{ $aluno->codigo_turma }}</td>
          <td>{{ $aluno->codigo_materia }}</td>
          <td><a class="btn btn-primary" href="editar/{{ $aluno->id }}">Editar</a></td>
          <td><a class="btn btn-danger" href="excluir/{{ $aluno->id }}">Excluir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection