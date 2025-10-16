@extends ('layouts.app')
@section('title', 'Listagem de professores')
@section('content')
        <h1>Lista de Professor:</h1>
        <a href="{{ route('professor.create') }}">Cadastrar</a>
    <table>
        <thead>
            <th>Nome:</th>
            <th>Disciplina:</th>
            <th>Email:</th>
            <th>Telefone:</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($professores as $professor)
            <tr>
                <td>{{ $professor->nome }}</td>
                <td>{{ $professor->disciplina }}</td>
                <td>{{ $professor->contatoProfessor->email }}</td>
                <td>{{ $professor->contatoProfessor->telefone }}</td>
            <td>
            <div class="d-flex">
                <div class="m-1">
                    <a class="btn btn-success" href="{{ route('professor.edit', $professor->id) }}">Alterar</a>
                </div>
                <div class="m-1">
                    <a class="btn btn-info" href="{{ route('professor.show', $professor->id) }}">Visualizar</a>
                </div>
                <div class="m-1">
                <form action="{{ route('professor.destroy', $professor->id) }}" method="post">
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

<h1>Professores com "João" no começo e "Silva" no final</h1>
@foreach ($professores_joao_silva as $professor)
    <ul>
        <p>{{ $professor->nome }}</p>
    </ul>
@endforeach
@endsection