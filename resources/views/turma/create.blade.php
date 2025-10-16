@extends ('layouts.app')
@section('title', 'Formulário de cadastro de turma')
@section('content')
    <h1>Cadastro de turma</h1>
        <form action="{{ route("turma.store") }}" method="post">
            @csrf
            <label for="">Descrição:</label>
             <input type="text" name="descricao">
            <br><br>
            <label for="">Curso:</label>
            <select name="curso_id" id="curso_id">
                <option value="" selected>Selecione:</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
            <br><br>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
@endsection