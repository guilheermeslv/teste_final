@extends ('layouts.app')
@section('title', 'Listagem de turmas')
@section('content')
    <h1>Lista de turmas:</h1>
    <br>
    <table class="table table-striped">
        <thead class="thead-light">
            <th>Descrição:</th>
            <th>Curso:</th>
            <th>Quantidade de alunos:</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
            <tr>
                <td>{{ $turma->descricao }}</td>
                <td>{{ $turma->curso->nome }}</td>
                <td>{{ $turma->alunos_count }}</td>
        <td>
            <div class="d-flex">
                <div class="m-1">
                    <a class="btn btn-success" href="{{ route('turma.edit', $turma->id) }}">Alterar</a>
                </div>
                <div class="m-1">
                    <a class="btn btn-info" href="{{ route('turma.show', $turma->id) }}">Visualizar</a>
                </div>
                <div class="m-1">
                <form action="{{ route('turma.destroy', $turma->id) }}" method="post">
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

<h1>Turmas com ID superior a 10</h1>
@foreach ($turmas_maior_10 as $turma)
    <ul>
        <p>{{ $turma->descricao }}</p>
    </ul>
@endforeach

<h1>Quantidade de turmas</h1>
<ul>
    <p>{{ $turmas_quant }}</p>
</ul>
@endsection