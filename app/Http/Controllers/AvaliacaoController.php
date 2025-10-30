<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\Curtida;
use App\Models\Descurtida;
use Illuminate\Support\Facades\Auth;

class AvaliacaoController extends Controller
{
    public function curtida($publicacao_id)
    {
        $user_id = auth()->id();

        $existingLike = Curtida::where('user_id', $user_id)
            ->where('publicacao_id', $publicacao_id)
            ->first();

        $existingDislike = Descurtida::where('user_id', $user_id)
            ->where('publicacao_id', $publicacao_id)
            ->first();
        if ($existingLike) {
            $existingLike->delete();
    }   else {
        if ($existingDislike) $existingDislike->delete();

        Curtida::create([
            'likes' => 1,
            'user_id' => $user_id,
            'publicacao_id' => $publicacao_id,
        ]);
    }

    return back();
}

    public function descurtida($publicacao_id)
    {
        $user_id = auth()->id();

        $existingDislike = Descurtida::where('user_id', $user_id)
            ->where('publicacao_id', $publicacao_id)
            ->first();

        $existingLike = Curtida::where('user_id', $user_id)
            ->where('publicacao_id', $publicacao_id)
            ->first();

        if ($existingDislike) {
            $existingDislike->delete();
        } else {
        if ($existingLike) $existingLike->delete();

        Descurtida::create([
            'dislikes' => 1,
            'user_id' => $user_id,
            'publicacao_id' => $publicacao_id,
        ]);
        }

        return back();
    }
}
