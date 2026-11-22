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
        <h2 class="text-center">EQUAÇÃO DO SEGUNDO GRAU</h2>

        <x-alert />

        <form method="POST" action="{{ route('segundo.calculo') }}">
            @csrf
            <div class="my-3">
                <input class="form-control form-control-lg" type="text" name="a" id="a"
                    placeholder="Digite o valor de A" value="{{ old('a') }}">
            </div>
            <div class="my-3">
                <input class="form-control form-control-lg" type="text" name="b" id="b"
                    placeholder="Digite o valor de B" value="{{ old('b') }}">
            </div>
            <div class="my-3">
                <input class="form-control form-control-lg" type="text" name="c" id="c"
                    placeholder="Digite o valor de C" value="{{ old('c') }}">
            </div>
            <div class="container-fluid col bg-white my-3 p-3">
                <button type="submit" class="btn btn-primary btn-lg w-100">CALCULAR EQUAÇÃO</button>
            </div>
        </form>

        @if (session("success"))
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card text-center shadow-sm border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-success">
                                A equação formada
                            </h5>

                            <p class="card-text mt-3">
                                {{ session("a") }}<sup>2</sup> + {{ session("b") }}X + {{ session("c") }} = 0
                            </p>
                            <p class="card-text mt-3">
                                Coeficientes: A = {{ session("a") }}, B = {{ session("b") }},  C = {{ session("c") }}
                            </p>
                            <p class="card-text mt-3">
                                Delta: ∆ = {{ session("b") }}<sup>2</sup> - 4.{{ session("a") }}.{{ session("c") }}
                            </p>
                            <p class="card-text mt-3">
                                Delta: ∆ = {{ session("delta") }}
                            </p>
                            <p class="card-text mt-3">
                                Raíz de Delta: √{{ session("delta") }} = {{ session("raizDelta") }}
                            </p>
                            <p class="card-text mt-3">
                                {{ session("descricao") }}
                            </p>
                            <p class="card-text mt-3">
                                {{ session("resultado") }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
