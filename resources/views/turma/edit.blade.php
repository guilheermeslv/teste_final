@extends ('layouts.app')
@section('title', 'Editar turma')
@section('content')
    <h1>Edição de registros de turma</h1>    
    <form action="{{ route("turma.update", $turma->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="">Descrição:</label>
     <input type="text" name="descricao" value="{{ $turma->descricao }}">
    <br><br>
    <label for="">Curso:</label>
    <select name="curso_id" id="curso_id">
        <option value="{{ $turma->curso_id }}" selected>{{ $turma->curso->nome }}</option>
        @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
        @endforeach
    </select>
    <br><br>
    <button type="submit">Enviar</button>
@endsection