@extends ('layouts.app')
@section('title', 'Editar alunos')
@section('content')
    <h1>EDIÇÃO DE REGISTROS DE ALUNOS</h1>    
    <form action="{{ route("curso.update", $curso->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="">Nome:</label>
     <input type="text" name="nome" value="{{ $curso->nome }}">
    <br><br>
    <button type="submit">Enviar</button>
@endsection