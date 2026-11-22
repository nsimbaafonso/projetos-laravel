<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Excluir Tarefa</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">

    <main class="container py-5">

        <section class="card border-0 shadow-sm mx-auto" style="max-width: 600px;">

            <header class="card-header bg-danger text-white text-center py-3">

                <h1 class="h4 mb-0">
                    <i class="fa-solid fa-trash me-2"></i>
                    Excluir Tarefa
                </h1>

            </header>

            <div class="card-body p-4 text-center">

                <div class="mb-4">

                    <i class="fa-solid fa-triangle-exclamation display-3 text-danger"></i>

                </div>

                <h2 class="h4">
                    Tem certeza que deseja excluir esta tarefa?
                </h2>

                <p class="text-muted">
                    Esta ação não poderá ser desfeita.
                </p>


                <div class="bg-light rounded-3 p-3 mb-4">

                    <strong class="d-block">
                        {{ $tarefa->titulo }}
                    </strong>

                    <span class="text-muted">
                        Data limite:
                        {{ \Carbon\Carbon::parse($tarefa->data_limite)->format('d/m/Y') }}
                    </span>

                </div>


                <form method="POST" action="{{ route('tarefas.destroy', $tarefa) }}">

                    @csrf
                    @method('DELETE')

                    <div class="d-flex gap-2">

                        <a href="{{ route('tarefas.index') }}" class="btn btn-outline-secondary flex-fill">
                            <i class="fa-solid fa-arrow-left me-2"></i>
                            CANCELAR
                        </a>

                        <button type="submit" class="btn btn-danger flex-fill">
                            <i class="fa-solid fa-trash me-2"></i>
                            SIM, EXCLUIR
                        </button>

                    </div>

                </form>

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
