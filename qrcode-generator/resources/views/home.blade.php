<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerador de QR Code</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body class="bg-light">

    <main class="container py-5">

        <section class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 600px;">

            <header class="card-header bg-primary text-white text-center">
                <h1 class="h3 mb-0">
                    Gerador de QR Code
                </h1>
            </header>

            <div class="card-body p-4">

                <x-alert />

                <form method="POST" action="{{ route('qrcode.generator') }}">

                    @csrf

                    <label for="texto" class="form-label fw-bold text-dark">
                        O que deseja transformar em QR Code?
                    </label>

                    <input type="text" class="form-control form-control-lg mb-3" name="texto" id="texto"
                        maxlength="500" value="{{ old('texto') }}" placeholder="Digite um texto ou endereço...">

                    <label for="tamanho" class="form-label fw-bold text-dark">
                        Tamanho do QR Code
                    </label>

                    <select name="tamanho" id="tamanho" class="form-select form-select-lg mb-3">
                        <option value="150">Pequeno - 150px</option>
                        <option value="250" selected>Médio - 250px</option>
                        <option value="350">Grande - 350px</option>
                        <option value="500">Muito grande - 500px</option>
                    </select>

                    <label for="cor" class="form-label fw-bold text-dark">
                        Cor do QR Code
                    </label>

                    <input type="color" name="cor" id="cor" class="form-control form-control-color mb-3"
                        value="{{ old('cor', '#000000') }}" title="Escolha a cor do QR Code">

                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        GERAR QR CODE
                    </button>

                </form>


                @if (session('success'))
                    <hr>

                    <h2 class="h4 text-center mb-3">
                        QR Code gerado
                    </h2>

                    <div class="text-center">

                        {!! session('resultado') !!}

                    </div>

                    <a href="{{ route('qrcode.download') }}" class="w-100 btn btn-success btn-lg mt-3">
                        BAIXAR QR CODE
                    </a>
                @endif

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
