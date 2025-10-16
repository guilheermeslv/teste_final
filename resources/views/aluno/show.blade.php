@extends ('layouts.app')
@section('title', 'Dados do aluno:')
@section('content')
<h1>Dados do Aluno:</h1>
    <p>Matrícula: {{ $aluno->matricula }}</p>
    <p>Nome: {{ $aluno->nome }}</p>
    <p>Email: {{ $aluno->email }}</p>
    <p>Data de nascimento: {{ $aluno->data_nascimento }}</p>
    <p>Telefone: {{ $aluno->contatoAluno->telefone }}</p>
    <img src="{{ asset($aluno->foto) }}" style="max-width: 400px; border: 1px solid; border-radius: 20px">

<h1>Alunos que nasceram antes do dia 01-01-2006</h1>
@foreach ($alunos_antes_0106 as $aluno)
    <ul>
        <p>{{ $aluno->nome }}</p>
    </ul>
@endforeach

<h1>Alunos que nasceram entre 01-01-2004 e 31-12-2006</h1>
@foreach ($alunos_entre_datas as $aluno)
    <ul>
        <p>{{ $aluno->nome }}</p>
    </ul>
@endforeach

<h1>Alunos que contém "Silva" no nome</h1>
@foreach ($alunos_silva as $aluno)
    <ul>
        <p>{{ $aluno->nome }}</p>
    </ul>
@endforeach

<h1>Alunos que nasceram após 01-01-2005 e com o email de domínio @gmail.com</h1>
@foreach ($alunos_apos_0105_gmail as $aluno)
    <ul>
        <p>{{ $aluno->nome }}</p>
    </ul>
@endforeach
@endsection