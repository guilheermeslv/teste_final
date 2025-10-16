@extends ('layouts.app')
@section('title', 'Formulário de cadastro')
@section('content')
    <h1>Formulário de cadastro de aluno</h1>
        <form action="{{ route("aluno.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Matrícula:</label>
             <input type="number" name="matricula">
            <br><br>
            <label for="">Nome:</label>
             <input type="text" name="nome">
            <br><br>
            <label for="">Email:</label>
             <input type="email" name="email">
            <br><br>
            <label for="">Data de nascimento:</label>
            <input type="date" name="data_nascimento">
            <br><br>
            <label for="">Telefone:</label>
            <input type="number" name="telefone">
            <br><br>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto">
                </div>
                <div class="col-md-6">
                    <label for="">Turma do aluno:</label>
                    <select name="turma_id" id="turma_id">
                        <option value="">Selecione:</option>
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->descricao }}</option>
                        @endforeach
                        </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
@endsection