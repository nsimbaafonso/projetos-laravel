<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nova Tarefa</title>

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
                    <i class="fa-solid fa-plus me-2"></i>
                    Nova Tarefa
                </h1>

            </header>

            <div class="card-body p-4">

                <x-alert />

                <form method="POST" action="{{ route('tarefas.store') }}">

                    @csrf

                    {{-- Título --}}
                    <div class="mb-3">

                        <label for="titulo" class="form-label fw-bold">
                            Título
                        </label>

                        <input type="text" name="titulo" id="titulo" class="form-control form-control-lg"
                            value="{{ old('titulo') }}" placeholder="Digite o título da tarefa">

                    </div>


                    {{-- Descrição --}}
                    <div class="mb-3">

                        <label for="descricao" class="form-label fw-bold">
                            Descrição
                        </label>

                        <textarea name="descricao" id="descricao" rows="4" class="form-control" placeholder="Descreva a tarefa">{{ old('descricao') }}</textarea>

                    </div>


                    <div class="row">

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">

                            <label for="status" class="form-label fw-bold">
                                Status
                            </label>

                            <select name="status" id="status" class="form-select">

                                <option value="">
                                    Selecione o status
                                </option>

                                <option value="pendente" @selected(old('status') === 'pendente')>
                                    Pendente
                                </option>

                                <option value="em_andamento" @selected(old('status') === 'em_andamento')>
                                    Em andamento
                                </option>

                                <option value="concluida" @selected(old('status') === 'concluida')>
                                    Concluída
                                </option>

                            </select>

                        </div>


                        {{-- Prioridade --}}
                        <div class="col-md-6 mb-3">

                            <label for="prioridade" class="form-label fw-bold">
                                Prioridade
                            </label>

                            <select name="prioridade" id="prioridade" class="form-select">

                                <option value="">
                                    Selecione a prioridade
                                </option>

                                <option value="baixa" @selected(old('prioridade') === 'baixa')>
                                    Baixa
                                </option>

                                <option value="media" @selected(old('prioridade') === 'media')>
                                    Média
                                </option>

                                <option value="alta" @selected(old('prioridade') === 'alta')>
                                    Alta
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- Data limite --}}
                    <div class="mb-4">

                        <label for="data_limite" class="form-label fw-bold">
                            Data limite
                        </label>

                        <input type="date" name="data_limite" id="data_limite" class="form-control"
                            value="{{ old('data_limite') }}">

                    </div>


                    <div class="d-flex gap-2">

                        <a href="{{ route('tarefas.index') }}" class="btn btn-outline-secondary flex-fill">
                            <i class="fa-solid fa-arrow-left me-2"></i>
                            VOLTAR
                        </a>

                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            SALVAR TAREFA
                        </button>

                    </div>

                </form>

            </div>

        </section>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
