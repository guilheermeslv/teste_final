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
                <p class="h3 mt-3">Sabor do Brasil</p>
                <hr style="border: 2px solid; border-color: #D97014; width: 70%">
                <div class="d-flex d-flex justify-content-center">
                    <p class="mr-5 h5">9<br>Quantidade de <br> likes</p>
                    <p class="h5">12<br>Quantidade de <br>dislikes</p>
                </div>
            </div>
            
        <!-- Coluna 2 -->
            <div class="col-md-6 py-4 border-left bg-light border-right">
                <div>
                    <p class="h1 text-center">Publicações</p>
                </div>
                <hr style="border: ">
            </div>

        <!-- Coluna 3 -->
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-start py-4">
                <a href="">Entrar</a>            
            </div>
        </div>
    </div>
</body
</html>