<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            background: {{ $cor }};
        }
    </style>
</head>

<body>
    <!--outros tipos: sm, md, lg, xl, xxl-->
    <section class="container-sm border py-3">
        <h2 class="text-center">{{ $mensagem }}</h2>
        <h3 class="text-center">Agora são {{ $hora }}h</h3>

        <img src="{{ asset($imagem) }}" alt="{{ $mensagem }}" <img src="{{ asset($imagem) }}"
            class="img-fluid rounded">>
    </section>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
