<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;

class HomeController extends Controller
{
    public function listarPublicacoes()
    {
        $publicacoes = Publicacao::all();
        
        return view('publicacao.index', compact('publicacoes'));
        return view('home');
    }
}
