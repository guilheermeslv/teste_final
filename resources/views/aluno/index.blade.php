@extends ('layouts.app')
@section('title', 'Listagem de alunos')
@section('content')
    <h1>Lista de alunos:
        @guest
        @endguest
    </h1>
    <br>
    <table class="table table-striped">
        <thead class="thead-light">
            <th>Matrícula:</th>
            <th>Nome:</th>
            <th>Email:</th>
            <th>Data de nascimento:</th>
            <th>Telefone:</th>
            @auth
            <th>Opções</th>
            @endauth
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->matricula }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->email }}</td>
                <td>{{ $aluno->data_nascimento }}</td>
                <td>{{ $aluno->contatoAluno->telefone }}</td>
        <td>
            <div class="d-flex">
                <div class="m-1">
                    <a class="btn btn-success" href="{{ route('aluno.edit', $aluno->id) }}">Alterar</a>
                </div>
                <div class="m-1">
                    <a class="btn btn-info" href="{{ route('aluno.show', $aluno->id) }}">Visualizar</a>
                </div>
                <div class="m-1">
                <form action="{{ route('aluno.destroy', $aluno->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
                </div>
            </div> 
            </tr>
        </td>
            @endforeach
        </tbody>
    </table>
@endsection