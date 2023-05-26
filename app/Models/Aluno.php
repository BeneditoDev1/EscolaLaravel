<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'aluno';
    public $timestamps = false;

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'codigo_turma');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'codigo_materia');
    }
}