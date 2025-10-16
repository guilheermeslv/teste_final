@extends ('layouts.app')
@section('title', 'Editar alunos')
@section('content')
    <h1>EDIÇÃO DE REGISTROS DE ALUNOS</h1>    
    <form action="{{ route("aluno.update", $aluno->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Matrícula:</label>
     <input type="number" name="matricula" value="{{ $aluno->matricula }}">
    <br><br>
    <label for="">Nome:</label>
     <input type="text" name="nome" value="{{ $aluno->nome }}">
    <br><br>
    <label for="">Email:</label>
     <input type="email" name="email" value="{{ $aluno->email }}">
    <br><br>
    <label for="">Data de nascimento:</label>
     <input type="date" name="data_nascimento" value="{{ $aluno->data_nascimento }}">
    <br><br>
    <label for="">Telefone:</label>
     <input type="number" name="telefone" value="{{ $aluno->contatoAluno->telefone }}">
    <br><br>
    <label for="foto" class="form-label">Foto</label>
     <input type="file" name="foto" id="foto">
    <img src="{{ asset($aluno->foto) }}" style="max-width: 400px">
    <br><br>
    <div class="col-md-6">
        <label for="">Turma do aluno:</label>
        <select name="turma_id" id="turma_id">
            <option value="">Selecione:</option>
            @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->descricao }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Enviar</button>
@endsection