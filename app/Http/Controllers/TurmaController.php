<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{
    public function listar()
    {
        $turmas = Turma::all();
        return view('listagemTurmas', compact('turmas'));
    }

    public function novo()
    {
        return view('frmTurma');
    }

    public function salvar(Request $request)
    {
        $turma = new Turma();
        $turma->nome = $request->input('nome');
        $turma->save();
        
        return redirect()->route('turma.listar');
    }

    public function editar($id)
    {
        $turma = Turma::find($id);
        return view('frmTurma', compact('turma'));
    }

    public function atualizar(Request $request, $id)
    {
        $turma = Turma::find($id);
        $turma->nome = $request->input('nome');
        $turma->save();
        
        return redirect()->route('turma.listar');
    }

    public function excluir($id)
    {
        $turma = Turma::find($id);
        $turma->delete();
        
        return redirect()->route('turma.listar');
    }
}
