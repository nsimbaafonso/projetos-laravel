<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerador de Cor RGB</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body class="bg-light">

    <main class="container py-5">

        <section class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 600px;">

            <header class="card-header bg-primary text-white text-center">
                <h1 class="h3 mb-0">
                    Gerador de Cor RGB
                </h1>
            </header>

            <div class="card-body p-4">

                <x-alert />

                <form method="POST" action="{{ route('generator.generator-color') }}">

                    @csrf

                    <label for="r" class="form-label fw-bold text-danger">
                        Vermelho (R)
                    </label>
                    <input type="number" class="form-control form-control-lg mb-3" name="r" id="r" min="0"
                        max="255" value="{{ old('r') }}" placeholder="0 - 255">


                    <label for="g" class="form-label fw-bold text-success">
                        Verde (G)
                    </label>
                    <input type="number" class="form-control form-control-lg mb-3" name="g" id="g" min="0"
                        max="255" value="{{ old('g') }}" placeholder="0 - 255">


                    <label for="b" class="form-label fw-bold text-primary">
                        Azul (B)
                    </label>
                    <input type="number" class="form-control form-control-lg mb-3" name="b" id="b" min="0"
                        max="255" value="{{ old('b') }}" placeholder="0 - 255">


                    <button class="btn btn-primary btn-lg w-100">
                        Gerar Cor
                    </button>

                </form>


                @if (session('success'))
                    <hr>

                    <h2 class="h4 text-center">
                        Cor Gerada
                    </h2>

                    <div class="rounded-4 shadow border my-3"
                        style="
                            height:180px;
                            background: {{ session("cor") }};
                        ">
                    </div>

                    <p class="alert alert-success text-center mb-0">
                        <strong>{{ session("cor") }}</strong>
                    </p>
                @endif

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
