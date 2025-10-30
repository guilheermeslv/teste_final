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
                <img class="empresa_usuario rounded-circle img-fluid" src="{{ asset(Auth::user()->foto) }}" alt="{{ asset(Auth::user()->nickname) }}">
                <p class="h2 mt-4 ">{{ Auth::user()->name }}</p>
                <hr style="border-top: 3px solid #000; border-color: #D97014; width: 70%">
                <div class="d-flex justify-content-center">
                    <p class="h5 mr-5">29<br>Quantidade <br> Likes</p>
                    <p class="h5 ml-5">12<br>Quantidade<br>Dislikes</p>
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
                    <p class="h2"><strong>{{ $publicacao->titulo_prato }}</strong></p>
                    <div class="text-center">
                    <img src="{{ asset($publicacao->foto) }}">
                    </div>
                <!-- Local e cidade -->
                    <div class="d-flex h5 justify-content-between p-1 mt-1">
                        <p><strong>{{ $publicacao->local }}</strong></p>
                        <p><strong>{{ $publicacao->cidade}}</strong></p>
                    </div>
                @foreach ($publicacao->avaliacoes as $avaliacao)
                    <div class="d-flex">
                        <!-- <form action="{{ route('like') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="publicacao_id" value="{{ $avaliacao->publicacao_id }}">
                                    <button type="submit" class="btn border-0 bg-transparent botaoLike" data-publicacao="{{ $publicacao->id }}">
                                        <img class="iconeLike" src="{{ asset('flecha_cima_vazia.svg') }}" alt="like" data-publicacao="{{ $publicacao->id }}">
                                    </button>
                            </form>
                            <p class="h3 mt-1 ml-1"> {{ $avaliacao->like }} </p>

                            <form action="{{ route('dislike') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="publicacao_id" value="{{ $avaliacao->publicacao_id }}">
                                    <button type="submit" class="btn border-0 bg-transparent botaoDislike" data-publicacao="{{ $publicacao->id }}">
                                        <img class="iconeDislike" src="{{ asset('flecha_baixo_vazia.svg') }}" alt="dislike" data-publicacao="{{ $publicacao->id }}">
                                    </button>
                            </form>
                            <p class="h3 mt-1 ml-1 dislikes-count" data-publicacao="{{ $publicacao->id }}">{{ $avaliacao->dislike }}</p> -->

                                @php
                                    $liked = $publicacao->curtidas->where('user_id', auth()->id())->count() > 0;
                                    $disliked = $publicacao->descurtidas->where('user_id', auth()->id())->count() > 0;
                                @endphp

                                <form action="{{ route('publicacao.curtida', $publicacao->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn border-0 bg-transparent botaoLike">
                                        <img src="{{ asset($liked ? '/flecha_cima_cheia.svg' : '/flecha_cima_vazia.svg') }}" alt="Like">
                                            {{ $publicacao->curtidas->count() }}
                                    </button>
                                </form>

                                <form action="{{ route('publicacao.descurtida', $publicacao->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn border-0 bg-transparent botaoDislike">
                                        <img src="{{ asset($disliked ? '/flecha_baixo_cheia.svg' : '/flecha_baixo_vazia.svg') }}" alt="Dislike">
                                            {{ $publicacao->descurtidas->count() }}
                                    </button>
                            </form>
                    </div>
                @endforeach
                </div>
                @endforeach

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function carregarEstado(publicacaoId) {
                    return localStorage.getItem(`estado_${publicacaoId}`) || null;
                }

                function salvarEstado(publicacaoId, estado) {
                    if (estado === null) {
                        localStorage.removeItem(`estado_${publicacaoId}`);
                    } else {
                        localStorage.setItem(`estado_${publicacaoId}`, estado);
                    }
                }

                function atualizarIcones(publicacaoId) {
                    const estado = carregarEstado(publicacaoId);
                    const iconeLike = document.querySelector(`.iconeLike[data-publicacao="${publicacaoId}"]`);
                    const iconeDislike = document.querySelector(`.iconeDislike[data-publicacao="${publicacaoId}"]`);

                    if (iconeLike && iconeDislike) {
                        iconeLike.src = "{{ asset('flecha_cima_vazia.svg') }}";
                        iconeDislike.src = "{{ asset('flecha_baixo_vazia.svg') }}";

                            if (estado === 'like') {
                                iconeLike.src = "{{ asset('flecha_cima_cheia.svg') }}";
                            } else if (estado === 'dislike') {
                                iconeDislike.src = "{{ asset('flecha_baixo_cheia.svg') }}";
                            }
                        }
                    }

            document.querySelectorAll('.iconeLike').forEach(icone => {
                const publicacaoId = icone.getAttribute('data-publicacao');
                    atualizarIcones(publicacaoId);
                });

            document.querySelectorAll('.botaoLike').forEach(botao => {
                botao.addEventListener('click', function(e) {
                e.preventDefault();
                    const publicacaoId = this.getAttribute('data-publicacao');
                    const estadoAtual = carregarEstado(publicacaoId);

                        if (estadoAtual === 'like') {
                            salvarEstado(publicacaoId, null);
                        } else {
                            salvarEstado(publicacaoId, 'like');
                        }

                        atualizarIcones(publicacaoId);
                        
                        this.closest('form').submit();
                        });
                });

            document.querySelectorAll('.botaoDislike').forEach(botao => {
                botao.addEventListener('click', function(e) {
                e.preventDefault();
                    const publicacaoId = this.getAttribute('data-publicacao');
                    const estadoAtual = carregarEstado(publicacaoId);

                        if (estadoAtual === 'dislike') {
                            salvarEstado(publicacaoId, null);
                        } else {
                            salvarEstado(publicacaoId, 'dislike');
                        }
                            atualizarIcones(publicacaoId);

                            this.closest('form').submit();
                        });
                    });
                });
        </script>
    </div>
        <!-- Coluna 3 -->
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-start py-4">
                <button type="button" id="btnEntrar">Entrar</button>
                <script src="{{ asset('js/home.js') }}"></script>
            </dialog>
        </div>
</body>
</html>