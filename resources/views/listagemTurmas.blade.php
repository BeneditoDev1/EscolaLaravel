@extends('template')

@section('conteudo')
  <h1>Listagem de Turmas</h1>
  <a href="{{ route('turma.novo') }}" class="btn btn-primary">Nova Turma</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody> 
      @foreach($turmas as $turma)
          <tr>
            <td>{{ $turma->id }}</td>
            <td>{{ $turma->nome }}</td>
            <td><a class="btn btn-primary" href="{{ route('turma.editar', $turma->id) }}">+</a></td>
            <td><a class="btn btn-danger" href="{{ route('turma.excluir', $turma->id) }}">-</a></td>
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection
