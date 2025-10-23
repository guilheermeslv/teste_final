<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;

class HomeController extends Controller
{
    public function listarPublicacoes()
    {
        return view('home');
    }
}
