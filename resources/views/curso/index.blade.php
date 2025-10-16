@extends ('layouts.app')
@section('title', 'Listagem de cursos')
@section('content')
    <h1>Lista de cursos:</h1>
    <br>
    <table class="table table-striped">
        <thead class="thead-light">
            <th>Nome:</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nome }}</td>
        <td>
            <div class="d-flex">
                <div class="m-1">
                    <a class="btn btn-success" href="{{ route('curso.edit', $curso->id) }}">Alterar</a>
                </div>
                <div class="m-1">
                    <a class="btn btn-info" href="{{ route('curso.show', $curso->id) }}">Visualizar</a>
                </div>
                <div class="m-1">
                <form action="{{ route('curso.destroy', $curso->id) }}" method="post">
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

<h1>Cursos com nome igual a "Administração" ou "Gestão"</h1>
@foreach ($cursos_adm_ges as $curso)
    <ul>
        <p>Nome: {{ $curso->nome }}</p>
    </ul>
@endforeach
@endsection