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
        $turma = new Turma();
        $turma->id = 0;
        return view('frmTurmas', compact('turma'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $turma = new Turma();
        } else {
            $turma = Turma::find($request->input('id'));
        }

        $turma->nome = $request->input('nome');
        $turma->save();
        
        return redirect()->route('turma.listar');
    }

    public function editar($id)
    {
        $turma = Turma::find($id);
        return view('frmTurmas', compact('turma'));
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
