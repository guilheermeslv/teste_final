<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curtida extends Model
{
    protected $table = 'curtida';
    protected $fillable = ['likes', 'user_id', 'publicacao_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publicacao()
    {
        return $this->belongsTo(Publicacao::class);
    }
}
