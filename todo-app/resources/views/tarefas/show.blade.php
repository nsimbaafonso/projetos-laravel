<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $tarefa->titulo }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">

    <main class="container py-5">

        <section class="card border-0 shadow-sm mx-auto" style="max-width: 700px;">

            <header class="card-header bg-primary text-white py-3">

                <h1 class="h4 mb-0">
                    <i class="fa-solid fa-eye me-2"></i>
                    Visualizar Tarefa
                </h1>

            </header>

            <div class="card-body p-4">

                <div class="text-center mb-4">

                    <div class="mb-3">
                        <i class="fa-solid fa-list-check display-3 text-primary"></i>
                    </div>

                    <h2 class="h3 fw-bold">
                        {{ $tarefa->titulo }}
                    </h2>

                </div>


                <hr>


                <div class="mb-4">

                    <h3 class="h6 fw-bold text-muted">
                        DESCRIÇÃO
                    </h3>

                    <p class="mb-0">
                        {{ $tarefa->descricao }}
                    </p>

                </div>


                <div class="row g-3">

                    {{-- Status --}}
                    <div class="col-md-6">

                        <div class="bg-light rounded-3 p-3">

                            <div class="text-muted small mb-1">
                                <i class="fa-solid fa-circle-check me-2"></i>
                                Status
                            </div>

                            @if ($tarefa->status === 'pendente')
                                <span class="badge text-bg-secondary">
                                    Pendente
                                </span>
                            @elseif ($tarefa->status === 'em_andamento')
                                <span class="badge text-bg-warning">
                                    Em andamento
                                </span>
                            @elseif ($tarefa->status === 'concluida')
                                <span class="badge text-bg-success">
                                    Concluída
                                </span>
                            @endif

                        </div>

                    </div>


                    {{-- Prioridade --}}
                    <div class="col-md-6">

                        <div class="bg-light rounded-3 p-3">

                            <div class="text-muted small mb-1">
                                <i class="fa-solid fa-flag me-2"></i>
                                Prioridade
                            </div>

                            @if ($tarefa->prioridade === 'baixa')
                                <span class="badge text-bg-success">
                                    Baixa
                                </span>
                            @elseif ($tarefa->prioridade === 'media')
                                <span class="badge text-bg-warning">
                                    Média
                                </span>
                            @elseif ($tarefa->prioridade === 'alta')
                                <span class="badge text-bg-danger">
                                    Alta
                                </span>
                            @endif

                        </div>

                    </div>


                    {{-- Data limite --}}
                    <div class="col-12">

                        <div class="bg-light rounded-3 p-3">

                            <div class="text-muted small">
                                <i class="fa-solid fa-calendar-days me-2"></i>
                                Data limite
                            </div>

                            <strong>
                                {{ \Carbon\Carbon::parse($tarefa->data_limite)->format('d/m/Y') }}
                            </strong>

                        </div>

                    </div>

                </div>


                <div class="d-flex gap-2 mt-4">

                    <a href="{{ route('tarefas.index') }}" class="btn btn-outline-secondary flex-fill">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        VOLTAR
                    </a>

                    <a href="{{ route('tarefas.edit', $tarefa) }}" class="btn btn-warning flex-fill">
                        <i class="fa-solid fa-pen me-2"></i>
                        EDITAR
                    </a>

                </div>

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
