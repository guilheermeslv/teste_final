<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sabor do Brasil</title>

    <!-- Bootstrap importado: V. 4.1.3 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">

        <!-- Coluna 1 -->
            <div class="col-md-3 text-center py-4 mt-3">
                <img src="{{ asset($empresa->logo) }}" alt="Sabor do Brasil">
                <p class="h3 mt-3">{{ $empresa->nome }}</p>
                <hr style="border: 2px solid; border-color: #D97014; width: 70%">
                <div class="d-flex d-flex justify-content-center">
                    <p class="mr-5 h5">9<br>Quantidade de <br> likes</p>
                    <p class="h5">12<br>Quantidade de <br>dislikes</p>
                </div>
            </div>
            
        <!-- Coluna 2 -->
            <div class="col-md-6 py-4 border-left bg-light border-right">

            <!-- Header de publicações -->
                <div>
                    <p class="h1 text-center">Publicações</p>
                    <hr style="border: 2px solid; border-color: #D97014">
                </div>

            <!-- Imagens das publicações -->
                @foreach ($publicacoes as $publicacao)
                <div class="card p-2" style="border-radius: 10px">
                    <p class="h2">{{ $publicacao->titulo_prato }}</p>
                    <div class="text-center">
                    <img src="{{ asset($publicacao->foto) }}">
                    </div>
                <!-- Local e cidade -->
                    <div class="d-flex h5 justify-content-between p-1">
                        <p>{{ $publicacao->local }}</p>
                        <p>{{ $publicacao->cidade}}</p>
                    </div>

                <!-- Ícones de like, dislike e comentário -->
                    <div class="d-flex">
                        <img src="{{ asset('flecha_cima_vazia.svg') }}" alt="">
                            <p class="h3 ml-2">2</p>
                        <img class="ml-3" src="{{ asset('flecha_baixo_vazia.svg') }}" alt="">
                            <p class="h3 ml-2">1</p>
                        <img style="margin-left: 570px" src="{{ asset('chat.svg') }}" alt="">
                            <p class="h3 ml-2">4</p>
                    </div>
                </div>
                @endforeach
                </div>

        <!-- Coluna 3 -->
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-start py-4">
                <button type="button" id="btnEntrar">Entrar</button>
        <!-- Modal de login -->
            <dialog>
                <div class="justify-content-center">
                    <h1>Login</h1>
                </div>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email -->
                
                    <div class="form-group">
                        <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Digite seu email"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                <!-- Senha -->
                    <div class="mt-2 form-group">
                        <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua senha"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                <!-- Botões Cancelar e Entrar -->
                    <div class="d-flex justify-between">
                        <button id="btnFormCancelar">Cancelar</button>
                        <button id="btnFormEntrar">Entrar</button>
                    </div>
                </form>
                <script src="{{ asset('js/home.js') }}"></script>
            </dialog>
        </div>
</body>
</html>