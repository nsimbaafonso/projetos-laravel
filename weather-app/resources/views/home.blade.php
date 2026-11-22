<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clima</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">

    <main class="container py-5">

        {{-- Cabeçalho --}}
        <header class="text-center mb-5">

            <h1 class="display-5 fw-bold text-dark">
                <i class="fa-solid fa-cloud-sun me-2"></i>
                Clima
            </h1>

            <p class="text-muted">
                Consulte as condições meteorológicas de qualquer localidade.
            </p>

        </header>


        {{-- Pesquisa --}}
        <section class="mb-5">

            <form method="POST" action="{{ route('weather.search') }}">

                @csrf

                <div class="input-group input-group-lg">

                    <span class="input-group-text bg-white">
                        <i class="fa-solid fa-location-dot text-muted"></i>
                    </span>

                    <input type="search" class="form-control" name="localidade" id="localidade"
                        value="{{ old('localidade') }}" placeholder="Pesquise uma cidade...">

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                        PESQUISAR
                    </button>

                </div>

            </form>

        </section>


        <x-alert />


        {{-- Resultado da pesquisa --}}
        @if (session('pesquisou'))

            @if (empty(session('resultado')))
                {{-- Localidade não encontrada --}}
                <section class="text-center py-5">

                    <div class="mb-4">
                        <i class="fa-solid fa-cloud-question display-3 text-secondary"></i>
                    </div>

                    <h2 class="h4 text-dark">
                        Localidade não encontrada
                    </h2>

                    <p class="text-muted">
                        Não encontramos informações meteorológicas para a localidade pesquisada.
                        Verifique o nome e tente novamente.
                    </p>

                </section>
            @else
                {{-- Resultado da pesquisa --}}
                <section class="mb-5">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h2 class="h4 mb-0">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            Clima atual
                        </h2>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-12 col-md-8 col-lg-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body p-4 text-center">

                                    <h3 class="h4 fw-bold mb-1">
                                        {{ session('resultado')['cidade'] }}
                                    </h3>

                                    <p class="text-muted mb-4">
                                        {{ session('resultado')['pais'] }}
                                    </p>

                                    <div class="mb-3">

                                        <i class="fa-solid fa-cloud-sun display-1 text-primary"></i>

                                    </div>

                                    <div class="display-3 fw-bold text-dark">
                                        {{ session('resultado')['temperatura'] }}°C
                                    </div>

                                    <p class="text-muted mt-2 mb-4">
                                        {{ session('resultado')['condicao'] }}
                                    </p>


                                    <div class="row g-3">

                                        <div class="col-6">

                                            <div class="bg-light rounded-3 p-3">

                                                <i class="fa-solid fa-temperature-half text-primary mb-2"></i>

                                                <div class="small text-muted">
                                                    Sensação térmica
                                                </div>

                                                <strong>
                                                    {{ session('resultado')['sensacao'] }}°C
                                                </strong>

                                            </div>

                                        </div>


                                        <div class="col-6">

                                            <div class="bg-light rounded-3 p-3">

                                                <i class="fa-solid fa-droplet text-primary mb-2"></i>

                                                <div class="small text-muted">
                                                    Humidade
                                                </div>

                                                <strong>
                                                    {{ session('resultado')['humidade'] }}%
                                                </strong>

                                            </div>

                                        </div>


                                        <div class="col-12">

                                            <div class="bg-light rounded-3 p-3">

                                                <i class="fa-solid fa-wind text-primary mb-2"></i>

                                                <div class="small text-muted">
                                                    Velocidade do vento
                                                </div>

                                                <strong>
                                                    {{ session('resultado')['vento'] }} km/h
                                                </strong>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>
            @endif
        @else
            {{-- Localidades padrão --}}
            <section>

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="h4 mb-0">
                        <i class="fa-solid fa-earth-americas me-2"></i>
                        Clima das localidades
                    </h2>

                    <span class="text-muted">
                        {{ count($localidades) }} localidades
                    </span>

                </div>


                <div class="row g-4">

                    @foreach ($localidades as $localidade)
                        <div class="col-12 col-md-6 col-lg-4">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body p-4 text-center">

                                    <h3 class="h5 fw-bold">
                                        {{ $localidade['cidade'] }}
                                    </h3>

                                    <p class="text-muted small">
                                        {{ $localidade['pais'] }}
                                    </p>

                                    <div class="my-4">

                                        <i class="fa-solid fa-cloud-sun display-2 text-primary"></i>

                                    </div>

                                    <div class="display-4 fw-bold">
                                        {{ round($localidade['temperatura']) }}°C
                                    </div>

                                    <p class="text-muted text-capitalize">
                                        {{ $localidade['condicao'] }}
                                    </p>

                                    <hr>

                                    <div class="row">

                                        <div class="col-6">

                                            <i class="fa-solid fa-droplet text-primary"></i>

                                            <div class="small text-muted">
                                                Humidade
                                            </div>

                                            <strong>
                                                {{ $localidade['humidade'] }}%
                                            </strong>

                                        </div>

                                        <div class="col-6">

                                            <i class="fa-solid fa-wind text-primary"></i>

                                            <div class="small text-muted">
                                                Vento
                                            </div>

                                            <strong>
                                                {{ round($localidade['vento'] * 3.6) }} km/h
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </section>

        @endif

    </main>


    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
