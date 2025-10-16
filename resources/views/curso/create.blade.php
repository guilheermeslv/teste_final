@extends ('layouts.app')
@section('title', 'Formulário de cadastro de curso')
@section('content')
    <h1>Cadastro de curso</h1>
        <form action="{{ route("curso.store") }}" method="post">
            @csrf
            <label for="">Nome:</label>
             <input type="text" name="nome">
            <br><br>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
@endsection