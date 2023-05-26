<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Materia;

class AlunoController extends Controller
{
    public function listar()
    {
        $alunos = Aluno::orderBy('nome')->get();
        return view('listagemAluno', compact('alunos'));
    }

    public function novo()
    {
        $aluno = new Aluno();
        $aluno->id = 0;
        return view('frmAluno', compact('aluno'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $aluno = new Aluno();
        } else {
            $aluno = Aluno::find($request->input('id'));
        }

        $aluno->nome = $request->input('nome');
        $aluno->cpf = $request->input('cpf');
        $aluno->sexo = $request->input('sexo');
        $aluno->codigo_turma = $request->input('codigo_turma');
        $aluno->codigo_materia = $request->input('codigo_materia');
        $aluno->save();

        return redirect('aluno/listar');
    }

    public function editar($id)
    {
        $aluno = Aluno::find($id);
        return view('frmAluno', compact('aluno'));
    }

    public function excluir($id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();

        return redirect('aluno/listar');
    }
}