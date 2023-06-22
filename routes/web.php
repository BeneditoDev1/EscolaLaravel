<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {

Route::get('/aluno/listar', [AlunoController::class, 'listar'])->name('aluno.listar');
Route::get('/aluno/novo', [AlunoController::class, 'novo'])->name('aluno.novo');
Route::post('/aluno/salvar', [AlunoController::class, 'salvar'])->name('aluno.salvar');
Route::get('/aluno/editar/{id}', [AlunoController::class, 'editar'])->name('aluno.editar');
Route::put('/aluno/editar/{id}', [AlunoController::class, 'atualizar'])->name('aluno.atualizar'); 
Route::get('/aluno/excluir/{id}', [AlunoController::class, 'excluir'])->name('aluno.excluir');
Route::get('/aluno/relatorio', [AlunoController::class, 'relatorio']);

Route::get('/materia/listar', [MateriaController::class, 'listar'])->name('materia.listar');
Route::get('/materia/novo', [MateriaController::class, 'novo'])->name('materia.novo');
Route::post('/materia/salvar', [MateriaController::class, 'salvar'])->name('materia.salvar');
Route::get('/materia/editar/{id}', [MateriaController::class, 'editar'])->name('materia.editar');
Route::put('/materia/editar/{id}', [MateriaController::class, 'atualizar'])->name('materia.atualizar'); 
Route::get('/materia/excluir/{id}', [MateriaController::class, 'excluir'])->name('materia.excluir');
Route::get('/materia/relatorio', [MateriaController::class, 'relatorio']);

Route::get('/professor/listar', [ProfessorController::class, 'listar'])->name('professor.listar');
Route::get('/professor/novo', [ProfessorController::class, 'novo'])->name('professor.novo');
Route::post('/professor/salvar', [ProfessorController::class, 'salvar'])->name('professor.salvar');
Route::get('/professor/editar/{id}', [ProfessorController::class, 'editar'])->name('professor.editar');
Route::put('/professor/editar/{id}', [ProfessorController::class, 'atualizar'])->name('professor.atualizar'); 
Route::get('/professor/excluir/{id}', [ProfessorController::class, 'excluir'])->name('professor.excluir');
Route::get('/professor/relatorio', [ProfessorController::class, 'relatorio']);


Route::get('/turma/listar', [TurmaController::class, 'listar'])->name('turma.listar');
Route::get('/turma/novo', [TurmaController::class, 'novo'])->name('turma.novo');
Route::post('/turma/salvar', [TurmaController::class, 'salvar'])->name('turma.salvar');
Route::get('/turma/editar/{id}', [TurmaController::class, 'editar'])->name('turma.editar');
Route::put('/turma/editar/{id}', [TurmaController::class, 'atualizar'])->name('turma.atualizar');
Route::post('/turma/editar/{id}', [TurmaController::class, 'editar'])->name('turma.editar');
Route::get('/turma/excluir/{id}', [TurmaController::class, 'excluir'])->name('turma.excluir');


Route::get('/', function () {
    return view('index');
    });

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
