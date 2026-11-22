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
        <h2 class="text-center">CALCULADORA IMC</h2>

        <x-alert />

        <form method="POST" action="{{ route('imc.calc') }}">
            @csrf
            <div class="my-3">
                <input class="form-control form-control-lg" type="text" name="name" id="name"
                    placeholder="Digite o seu nome aqui" value="{{ old('name') }}">
            </div>
            <div class="my-3">
                <input class="form-control form-control-lg" type="number" step="0.1" name="peso" id="peso"
                    placeholder="Digite o seu peso (Ex: 75)" value="{{ old('peso') }}">
            </div>
            <div class="my-3">
                <input class="form-control form-control-lg" type="number" step="0.01" name="altura" id="altura"
                    placeholder="Digite a sua altura (Ex: 1.75)" value="{{ old('altura') }}">
            </div>
            <div class="container-fluid col bg-white my-3 p-3">
                <button type="submit" class="btn btn-primary btn-lg w-100">CALCULAR IMC</button>
            </div>
        </form>

        @if (session("imc"))
            <div class="row justify-content-center mt-4">
                <h4>Resultado</h4>

                <p>
                    Nome:
                    <strong>{{ session("nome") }}</strong>
                </p>

                <p>
                    IMC:
                    <strong>{{ number_format(session("imc"), 2) }}</strong>
                </p>

                <p>
                    {{ session("descricao") }}
                </p>
            </div>
        @endif
    </section>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
