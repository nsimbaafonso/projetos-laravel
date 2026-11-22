<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Buscador de Imagens</title>

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
                <i class="fa-solid fa-images me-2"></i>
                Buscador de Imagens
            </h1>

            <p class="text-muted">
                Pesquise imagens através da nossa busca.
            </p>

        </header>


        {{-- Barra de pesquisa --}}
        <section class="mb-5">

            <form method="POST" action="{{ route('images.search') }}">

                @csrf

                <div class="input-group input-group-lg">

                    <span class="input-group-text bg-white">
                        <i class="fa-solid fa-magnifying-glass text-muted"></i>
                    </span>

                    <input type="search" class="form-control" name="pesquisa" id="pesquisa"
                        value="{{ old('pesquisa') }}" placeholder="Pesquise por uma imagem...">

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                        PESQUISAR
                    </button>

                </div>

            </form>

        </section>


        <x-alert />


        {{-- Nenhuma pesquisa realizada --}}
        @if (!session('pesquisou'))

            <section class="text-center py-5">

                <div class="mb-4">
                    <i class="fa-solid fa-magnifying-glass display-3 text-secondary"></i>
                </div>

                <h2 class="h4 text-dark">
                    Pesquise por uma imagem
                </h2>

                <p class="text-muted">
                    Digite algo na barra de pesquisa para começar.
                </p>

            </section>


            {{-- Pesquisou mas não encontrou --}}
        @elseif (empty(session('resultados')))
            <section class="text-center py-5">

                <div class="mb-4">
                    <i class="fa-regular fa-image display-3 text-secondary"></i>
                </div>

                <h2 class="h4 text-dark">
                    Nenhuma imagem encontrada
                </h2>

                <p class="text-muted">
                    Não encontramos imagens para a sua pesquisa.
                    Tente utilizar outros termos.
                </p>

            </section>


            {{-- Resultados encontrados --}}
        @else
            <section>

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="h4 mb-0">
                        <i class="fa-solid fa-images me-2"></i>
                        Resultados da pesquisa
                    </h2>

                    <span class="text-muted">
                        {{ count(session('resultados')) }} resultados
                    </span>

                </div>


                <div class="row g-4">

                    @foreach (session('resultados') as $imagem)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">

                            <div class="card border-0 shadow-sm h-100">

                                <img src="{{ $imagem['url'] }}" alt="{{ $imagem['alt'] ?? 'Imagem pesquisada' }}"
                                    class="card-img-top" style="height: 220px; object-fit: cover;">

                                <div class="card-body">

                                    <p class="card-text text-muted small mb-0">
                                        {{ $imagem['alt'] ?? 'Imagem' }}
                                    </p>

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
