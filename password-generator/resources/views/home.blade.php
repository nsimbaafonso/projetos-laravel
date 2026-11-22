<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerador de Senhas</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body class="bg-light">

    <main class="container py-5">

        <section class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 600px;">

            <header class="card-header bg-primary text-white text-center py-3">
                <h1 class="h3 mb-0">
                    Gerador de Senhas
                </h1>
            </header>

            <div class="card-body p-4">

                <x-alert />

                <form method="POST" action="{{ route('password.generate') }}">

                    @csrf

                    {{-- Tamanho da senha --}}
                    <div class="mb-4">

                        <label for="tamanho" class="form-label fw-bold text-dark">
                            Tamanho da senha
                        </label>

                        <input type="number" class="form-control form-control-lg" name="tamanho" id="tamanho"
                            min="8" max="100" value="{{ old('tamanho', 12) }}" placeholder="Ex: 12">

                        <div class="form-text">
                            Escolha um tamanho entre 8 e 100 caracteres.
                        </div>

                    </div>


                    {{-- Opções da senha --}}
                    <div class="mb-4">

                        <label class="form-label fw-bold text-dark">
                            Caracteres que deseja utilizar
                        </label>

                        <div class="border rounded-3 p-3">

                            {{-- Maiúsculas --}}
                            <div class="form-check mb-2">

                                <input class="form-check-input" type="checkbox" name="maiusculas" id="maiusculas"
                                    value="1" @checked(old('maiusculas'))>

                                <label class="form-check-label" for="maiusculas">
                                    Letras maiúsculas
                                    <span class="text-muted">(A-Z)</span>
                                </label>

                            </div>


                            {{-- Minúsculas --}}
                            <div class="form-check mb-2">

                                <input class="form-check-input" type="checkbox" name="minusculas" id="minusculas"
                                    value="1" @checked(old('minusculas'))>

                                <label class="form-check-label" for="minusculas">
                                    Letras minúsculas
                                    <span class="text-muted">(a-z)</span>
                                </label>

                            </div>


                            {{-- Números --}}
                            <div class="form-check mb-2">

                                <input class="form-check-input" type="checkbox" name="numeros" id="numeros"
                                    value="1" @checked(old('numeros'))>

                                <label class="form-check-label" for="numeros">
                                    Números
                                    <span class="text-muted">(0-9)</span>
                                </label>

                            </div>


                            {{-- Símbolos --}}
                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" name="simbolos" id="simbolos"
                                    value="1" @checked(old('simbolos'))>

                                <label class="form-check-label" for="simbolos">
                                    Símbolos
                                    <span class="text-muted">(!@#$%...)</span>
                                </label>

                            </div>

                        </div>

                    </div>


                    {{-- Botão --}}
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        GERAR SENHA
                    </button>

                </form>


                {{-- Resultado --}}
                @if (session('success'))
                    <hr class="my-4">

                    <h2 class="h4 text-center mb-3">
                        Senha gerada
                    </h2>

                    <div class="alert alert-success text-center mb-0">

                        <strong class="fs-5 text-break" id="senha">
                            {{ session('resultado') }}
                        </strong>

                    </div>

                    <button type="button" class="btn btn-dark w-100 mt-3" id="copiar">
                        Copiar senha
                    </button>
                @endif

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script>
        const senha = document.getElementById("senha");
        const copiar = document.getElementById("copiar");

        copiar.addEventListener("click", async function() {

            const textoSenha = senha.textContent.trim();

            try {
                await navigator.clipboard.writeText(textoSenha);

                alert("Senha copiada com sucesso!");
            } catch (erro) {
                alert("Não foi possível copiar a senha.");
            }

        });
    </script>

</body>

</html>
