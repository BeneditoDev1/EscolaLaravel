<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;

class Professor extends Model
{
    use HasFactory;
    protected $table = 'professor';
    public $timestamps = false;

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'codigo_materia');
    }
}
