<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Materia;

class ProfessorController extends Controller
{
    public function listar()
    {
        $professores = Professor::orderBy('nome')->get();
        return view('listagemProfessor', compact('professores'));
    }

    public function novo()
    {
        $professor = new Professor();
        $professor->id = 0;
        return view('frmProfessor', compact('professor'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $professor = new Professor();
        } else {
            $professor = Professor::find($request->input('id'));
        }

        $professor->nome = $request->input('nome');
        $professor->cpf = $request->input('cpf');
        $professor->sexo = $request->input('sexo');
        $professor->codigo_materia = $request->input('codigo_materia');
        $professor->save();

        return redirect()->route('professor.listar');
    }

    public function editar($id)
    {
        $professor = Professor::find($id);
        return view('frmProfessor', compact('professor'));
    }

    public function excluir($id)
    {
        $professor = Professor::find($id);
        $professor->delete();
        return redirect()->route('professor.listar');
    }
}