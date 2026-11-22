<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fatorial</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body class="bg-light">

    <main class="container py-5">

        <section class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 600px;">

            <header class="card-header bg-primary text-white text-center">
                <h1 class="h3 mb-0">
                    Calculando Fatorial
                </h1>
            </header>

            <div class="card-body p-4">

                <x-alert />

                <form method="POST" action="{{ route('fatorial.calc-fatorial') }}">

                    @csrf

                    <label for="fatorial" class="form-label fw-bold text-dark">
                        Digite o valor
                    </label>
                    <input type="number" class="form-control form-control-lg mb-3" name="fatorial" id="fatorial" min="0"
                        max="100" value="{{ old('fatorial') }}" placeholder="0 - 100">


                    <button class="btn btn-primary btn-lg w-100">
                        Calcular Fatorial
                    </button>

                </form>


                @if (session('success'))
                    <hr>

                    <h2 class="h4 text-center">
                        Fatorial calculado
                    </h2>

                    <p class="alert alert-success text-center mb-0">
                        <strong>{{ session("resultado") }}</strong>
                    </p>
                @endif

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
