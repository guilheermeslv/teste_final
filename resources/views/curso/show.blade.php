@extends ('layouts.app')
@section('title', 'Dados do curso:')
@section('content')
<h1>Dados do Curso:</h1>

@foreach ($curso_dif as $curso)
    <ul>
    <p>Nome: {{ $curso->nome }}</p>
    </ul>
@endforeach
@endsection