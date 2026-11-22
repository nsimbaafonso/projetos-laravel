<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <!--outros tipos: sm, md, lg, xl, xxl-->
    <section class="container-sm border py-3">
        <h2 class="text-center">Encurtador de URLs</h2>

        <x-alert />

        <form method="POST" action="/shorten">
            @csrf
            <div class="my-3">
                <input class="form-control form-control-lg" type="text" name="url" id="url"
                    placeholder="Cole a URL aqui" value="{{ old('url') }}">
            </div>
            <div class="container-fluid col bg-white my-3 p-3">
                <button type="submit" class="btn btn-primary btn-lg w-100">ENCURTAR URL</button>
            </div>
        </form>

        @if (session('short_url'))
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">

                    <div class="card text-center shadow-sm border-primary">
                        <div class="card-body">

                            <h5 class="card-title text-success">
                                URL encurtada com sucesso
                            </h5>

                            <p class="card-text mt-3">
                                Sua URL curta é:
                            </p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control text-center" id="shortUrl"
                                    value="{{ session('short_url') }}" readonly>
                                <button class="btn btn-outline-primary" type="button" onclick="copyUrl()">
                                    Copiar
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        @endif
    </section>

    <script src="js/bootstrap.bundle.js"></script>
    <script>
        // Função responsável por copiar a URL curta para o clipboard
        function copyUrl() {

            // Seleciona o elemento input que contém a URL curta
            let input = document.getElementById("shortUrl");

            // Seleciona todo o texto dentro do input (para desktop)
            input.select();

            // Garante compatibilidade com dispositivos móveis (seleção total do texto)
            input.setSelectionRange(0, 99999);

            // Copia o valor do input diretamente para o clipboard do utilizador
            navigator.clipboard.writeText(input.value);

            // Mostra uma mensagem simples de confirmação
            alert("URL copiada com sucesso!");
        }
    </script>
</body>

</html>
