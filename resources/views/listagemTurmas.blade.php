@extends('template')

@section('conteudo')
  <h1>Listagem de Turmas</h1>
  <a href="{{ route('turma.novo') }}" class="btn btn-primary">Nova Turma</a>
  <a href="relatorio" class="btn btn-primary">Relatório</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody> 
      @foreach($turmas as $turma)
          <tr>
            <td>{{ $turma->id }}</td>
            <td>{{ $turma->nome }}</td>
            <td><a class='btn btn-primary' href='editar/{{$turma->id}}'>Editar</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$turma->id}}'>Excluir</a></td>
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection
