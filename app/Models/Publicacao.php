<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacao';
    protected $fillable = ['foto', 'titulo_prato', 'local', 'cidade', 'empresa_id'];
    public $timestamps = false;

    public function avaliacao()
    {
        return $this->hasMany(Avaliacao::class, 'publicacao_id');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'publicacao_id');
    }


    public function totalLikes()
    {
        return $this->avaliacoes()->where('like', true)->count();
    }

    public function totalDislikes()
    {
        return $this->avaliacoes()->where('dislike', true)->count();
    }

    public function curtidas()
    {
        return $this->hasMany(Curtida::class, 'publicacao_id');
    }

    public function descurtidas()
    {
        return $this->hasMany(Descurtida::class, 'publicacao_id');
    }
}
