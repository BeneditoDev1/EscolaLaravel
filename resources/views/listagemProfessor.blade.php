@extends('template')

@section('conteudo')
  <h1>Listagem de Professores</h1>
  <a href="novo" class="btn btn-primary">Novo Professor</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Sexo</th>
        <th>Código Matéria</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody> 
      @foreach($professores as $professor)
          <tr>
            <td>{{$professor->id}}</td>
            <td>{{$professor->nome}}</td>
            <td>{{$professor->cpf}}</td>
            <td>{{$professor->sexo}}</td>
            <td>{{$professor->codigo_materia}}</td>
            <td><a class='btn btn-primary' href='editar/{{$professor->id}}'>Editar</a></td>
            <td><a class='btn btn-danger' href='excluir/{{$professor->id}}'>Excluir</a></td>
          </tr>
      @endforeach

   </tbody>
  </table>
@endsection
