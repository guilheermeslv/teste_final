<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Publicacao;

class HomeController extends Controller
{
    public function home()
    {
        $empresa = Empresa::find(1);
        $publicacoes = Publicacao::all();

        return view('home', compact('empresa', 'publicacoes'));
    }
}
