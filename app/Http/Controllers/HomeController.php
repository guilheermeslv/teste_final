<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Empresa;
use App\Models\Publicacao;
use App\Models\Avaliacao;
use App\Models\Curtida;
use App\Models\Descurtida;

class HomeController extends Controller
{
    public function home()
    {
        $empresa = Empresa::find(1);
        $publicacoes = Publicacao::all();
        $avaliacoes = Avaliacao::where('user_id', Auth::id())->get();
        $likesTotais = Curtida::sum('likes');
        $dislikesTotais = Descurtida::sum('dislikes');

        return view('home', compact('empresa', 'publicacoes', 'avaliacoes', 'likesTotais', 'dislikesTotais'));
    }
}
