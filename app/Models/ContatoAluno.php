<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContatoAluno extends Model
{
    protected $table = 'contato_aluno';
    protected $fillable = ['telefone', 'aluno_id'];
    public $timestamps = false;

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
