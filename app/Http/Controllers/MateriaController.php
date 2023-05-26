<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function listar()
    {
        $materias = Materia::all();
        return view('listagemMaterias', compact('materias'));
    }

    public function novo()
    {
        $materia = new Materia();
        return view('frmMateria', compact('materia'));
    }

    public function salvar(Request $request)
    {
        $materia = new Materia();
        $materia->nome = $request->input('nome');
        $materia->descricao = $request->input('descricao');
        $materia->save();

        return redirect()->route('materia.listar');
    }

    public function editar($id)
    {
        $materia = Materia::find($id);
        return view('frmMateria', compact('materia'));
    }

    public function excluir($id)
    {
        $materia = Materia::find($id);
        $materia->delete();
        return redirect()->route('materia.listar');
    }
}
