<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Materia;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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

    if ($request->hasFile('arquivo')) {
        $file = $request->file('arquivo');
        $upload = $file->store('public/imagens');
        $upload = explode("/", $upload);
        $tamanho = sizeof($upload);
        if ($aluno->imagem != "") {
            Storage::delete("public/imagens/".$aluno->imagem);
        }
        $aluno->imagem = $upload[$tamanho-1];
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

    public function atualizar(Request $request, $id)
    {
    $aluno = Aluno::find($id);

    if (!$aluno) {
        return redirect()->route('aluno.listar')->with('error', 'Aluno não encontrado.');
    }

    $aluno->nome = $request->input('nome');
    $aluno->cpf = $request->input('cpf');
    $aluno->sexo = $request->input('sexo');
    $aluno->codigo_turma = $request->input('codigo_turma');
    $aluno->codigo_materia = $request->input('codigo_materia');
    $aluno->save();

    return redirect()->route('aluno.listar')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function excluir($id)
    {
        $aluno = Aluno::find($id);
        if ($aluno->imagem != "") {
            Storage::delete("public/imagens/".$aluno->imagem);
          }
        $aluno->delete();

        return redirect('aluno/listar');
    }

    function relatorio() {
        $alunos = Aluno::with('turma', 'materia')->orderBy('id')->get();
        $pdf = Pdf::loadView('relatorioAluno', compact('alunos'));
        return $pdf->download('alunos.pdf');
      }
}