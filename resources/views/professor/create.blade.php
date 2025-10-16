@extends ('layouts.app')
@section('title', 'Cadastro de professores')
@section('content')
        <h1>Formulário de cadastro de professores</h1>
            <form action="{{ route("professor.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Nome:</label>
             <input type="text" name="nome">
            <br><br>
            <label for="">Disciplina:</label>
             <input type="text" name="disciplina">
            <br><br>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="foto" class="form-label">Imagem</label>
                    <input type="file" name="foto" id="foto">
                </div>
            </div>
            <label for="">Email:</label>
             <input type="email" name="email">
            <br><br>
            <label for="">Telefone:</label>
             <input type="number" name="telefone">
            <br><br>
            <button type="submit">Enviar</button>
        </form>    
@endsection