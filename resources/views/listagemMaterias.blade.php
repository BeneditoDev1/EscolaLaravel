@extends('template')

@section('conteudo')
  <h1>Listagem de Matérias</h1>
  <a href="{{ route('materia.novo') }}" class="btn btn-primary">Nova Matéria</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody> 
      @foreach($materias as $materia)
          <tr>
            <td>{{ $materia->id }}</td>
            <td>{{ $materia->nome }}</td>
            <td>{{ $materia->descricao }}</td>
            <td><a class='btn btn-primary' href='editar/{{$materia->id}}'>Editar</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$materia->id}}'>Excluir</a></td>
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection
