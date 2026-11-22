<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tarefas</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">

    <main class="container py-5">

        <header class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1 class="h2 fw-bold text-dark mb-1">
                    <i class="fa-solid fa-list-check me-2"></i>
                    Minhas Tarefas
                </h1>

                <p class="text-muted mb-0">
                    Gerencie as suas tarefas.
                </p>
            </div>

            <a href="{{ route('tarefas.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>
                NOVA TAREFA
            </a>

        </header>

        <x-alert />

        <section class="card border-0 shadow-sm">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>
                                <th class="px-4">#</th>
                                <th>Título</th>
                                <th>Status</th>
                                <th>Prioridade</th>
                                <th>Data limite</th>
                                <th class="text-end px-4">Ações</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($tarefas as $tarefa)
                                <tr>

                                    <td class="px-4">
                                        {{ $tarefa->id }}
                                    </td>

                                    <td>
                                        <strong>
                                            {{ $tarefa->titulo }}
                                        </strong>
                                    </td>

                                    <td>

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
                                        @else
                                            <span class="badge text-bg-secondary">
                                                {{ $tarefa->status }}
                                            </span>
                                        @endif

                                    </td>

                                    <td>

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
                                        @else
                                            <span class="badge text-bg-secondary">
                                                {{ $tarefa->prioridade }}
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($tarefa->data_limite)->format('d/m/Y') }}
                                    </td>

                                    <td class="text-end px-4">

                                        <a href="{{ route('tarefas.show', $tarefa) }}"
                                            class="btn btn-sm btn-outline-primary" title="Visualizar">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="{{ route('tarefas.edit', $tarefa) }}"
                                            class="btn btn-sm btn-outline-warning" title="Editar">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <a href="{{ route('tarefas.delete', $tarefa) }}"
                                            class="btn btn-sm btn-outline-danger" title="Excluir">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-5">

                                        <i class="fa-solid fa-clipboard-list display-5 text-secondary mb-3"></i>

                                        <h2 class="h5">
                                            Nenhuma tarefa encontrada
                                        </h2>

                                        <p class="text-muted mb-3">
                                            Ainda não existem tarefas cadastradas.
                                        </p>

                                        <a href="{{ route('tarefas.create') }}" class="btn btn-primary">
                                            <i class="fa-solid fa-plus me-2"></i>
                                            Criar tarefa
                                        </a>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
