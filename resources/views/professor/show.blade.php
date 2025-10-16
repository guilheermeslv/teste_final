@extends ('layouts.app')
@section('title', 'Listagem de professores')
@section('content')
    <h1>Dados dos Professores:</h1>
    <p>Nome: {{ $professor->nome }}</p>
    <p>Disciplina: {{ $professor->disciplina }}</p>
    <img src="{{ asset($professor->foto) }}" style="max-width: 400px; border: 1px solid; border-radius: 20px">
    <p>Email: {{ $professor->contatoProfessor->email }}</p>
    <p>Telefone: {{ $professor->contatoProfessor->telefone }}</p>
@endsection