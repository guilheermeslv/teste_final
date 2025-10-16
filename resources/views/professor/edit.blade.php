@extends ('layouts.app')
@section('title', 'Edição de professores')
@section('content')
    <h1>EDIÇÃO DE REGISTROS DE PROFESSORES</h1>
    <form action="{{ route("professor.update", $professor->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Nome:</label>
     <input type="text" name="nome" value="{{ $professor->nome }}">
    <br><br>
    <label for="">Disciplina:</label>
     <input type="text" name="disciplina" value="{{ $professor->disciplina }}">
    <br><br>
    <label for="foto" class="form-label">Imagem</label>
    <input type="file" name="foto" id="foto">
    <img src="{{ asset($professor->foto) }}" style="max-width: 400px">
    <br><br>
    <label for="">Email:</label>
     <input type="email" name="email" value="{{ $professor->contatoProfessor->email }}">
    <br><br>
    <label for="">Telefone:</label>
     <input type="number" name="telefone" value="{{ $professor->contatoProfessor->telefone }}">
    <br><br>
    <button type="submit">Enviar</button>
@endsection