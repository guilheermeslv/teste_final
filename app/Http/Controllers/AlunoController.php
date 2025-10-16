<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\ContatoAluno;
use App\Models\Turma;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        $alunos_nascimento_0510 = Aluno::where('data_nascimento', '2005-05-10')->get();
        $turmas = Turma::all();

        return view('aluno.index', compact('alunos', 'turmas', 'alunos_nascimento_0510'));
    }

    public function contato() 
    {
        return view('aluno.contato');
    }

    public function create()
    {
        $turmas = Turma::all();

        return view('aluno.create', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto = null;

        if($request->hasFile('foto')) {
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(), PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo . '-' . time() . '.' . $extensao_arquivo;

        $request->foto->move(public_path('imagens'), $foto);
        }

        $aluno = Aluno::create([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/' . isset($foto) ? $foto : $aluno->foto
        ]);
        
        $aluno->turmas()->attach($request->turma_id);

        $aluno->contatoAluno()->create([
            'telefone' => $request->telefone
        ]);

        return redirect()->route('aluno.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno = Aluno::find($id);
        $alunos_antes_0106 = Aluno::whereDate('data_nascimento', '<', '2006-01-01')->get();
        $alunos_entre_datas = Aluno::whereBetween('data_nascimento', ['2004-01-01', '2006-12-31'])->get();
        $alunos_silva = Aluno::where('nome', 'like', '%Silva')->get();
        $alunos_apos_0105_gmail = Aluno::whereDate('data_nascimento', '>', '2005-01-01')
        ->where('email', 'like', '%@gmail.com')->get();
        
        return view('aluno.show', compact('aluno','alunos_antes_0106', 'alunos_entre_datas', 'alunos_silva', 'alunos_apos_0105_gmail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::find($id);
        $turmas = Turma::all();

        return view('aluno.edit', compact('aluno', 'turmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $foto = null;

        if ($request->hasFile('foto')) {
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(), PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo . '-' . time() . '.' . $extensao_arquivo;

        $request->foto->move(public_path('imagens'), $foto);
        }

        $aluno = Aluno::find($id);
        $aluno->update([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/' . isset($foto) ? $foto : $aluno->foto
        ]);

        $aluno->turmas()->syncWithoutDetaching($request->turma_id);

        $aluno->contatoAluno()->update([
            'telefone' => $request->telefone
        ]);

        return redirect()->route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        $aluno->contatoAluno()->delete();
        $aluno->delete();

        return redirect()->route('aluno.index');
    }
}
