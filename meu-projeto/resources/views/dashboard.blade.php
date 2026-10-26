<x-app-layout>
    <div
        class="aqua-workspace"
        x-data="{ tab: ['peixes', 'categorias'].includes(location.hash.slice(1)) ? location.hash.slice(1) : 'catalogo' }"
        @hashchange.window="tab = ['peixes', 'categorias'].includes(location.hash.slice(1)) ? location.hash.slice(1) : 'catalogo'"
    >

        {{-- ========== CABEÇALHO ========== --}}
        <header class="aqua-welcome">
            <div>
                <span class="auth-kicker">SEU UNIVERSO AQUÁTICO</span>
                <h1>Um lugar para cada espécie.</h1>
                <p>Cuide dos detalhes. Dê vida ao seu catálogo.</p>
            </div>
            <span class="aqua-welcome-mark" aria-hidden="true">≈</span>
        </header>

        {{-- ========== ABAS ========== --}}
        <nav class="aqua-tabs" aria-label="Seções do catálogo">
            <a
                href="#catalogo"
                :class="{ 'is-active': tab === 'catalogo' }"
                :aria-current="tab === 'catalogo' ? 'page' : null"
            >
                Catálogo de peixes
            </a>
            <a
                href="#peixes"
                :class="{ 'is-active': tab === 'peixes' }"
                :aria-current="tab === 'peixes' ? 'page' : null"
            >
                Cadastrar peixe
            </a>
            <a
                href="#categorias"
                :class="{ 'is-active': tab === 'categorias' }"
                :aria-current="tab === 'categorias' ? 'page' : null"
            >
                Cadastrar categoria
            </a>
        </nav>

        {{-- ========== CATÁLOGO ========== --}}
        <section
            x-show="tab === 'catalogo'"
            x-cloak
            class="aqua-panel"
            aria-labelledby="catalog-title"
        >
            <div class="aqua-panel-heading">
                <div>
                    <span class="auth-kicker">EXPLORE SEU CATÁLOGO</span>
                    <h2 id="catalog-title">Peixes e suas categorias</h2>
                    <p>Uma visão de cada peixe e do tipo ao qual ele pertence.</p>
                </div>
                <a href="#peixes" class="aqua-button">+ Cadastrar peixe</a>
            </div>

            <div class="aqua-demo-note">
                Prévia do layout · Os registros abaixo são exemplos ilustrativos.
            </div>

            <div class="aqua-table-scroll">
                <table class="aqua-table">
                    <caption class="sr-only">Exemplos de peixes com nome, cor e categoria</caption>
                    <thead>
                        <tr>
                            <th scope="col">Peixe</th>
                            <th scope="col">Cor</th>
                            <th scope="col">Categoria</th>
                            <th scope="col" class="aqua-actions-heading">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fish as $onefish)
                        <tr>
                            <td>
                                <strong>{{ $onefish->name }}</strong>
                            </td>
                            <td>
                                {{ $onefish->color }}
                            </td>
                            <td>
                                <span class="aqua-badge">{{ $onefish->type->name }}</span>
                            </td>
                            <td>
                                <div class="aqua-table-actions">
                                    <button
                                        type="button"
                                        class="aqua-action-button aqua-action-edit"
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-fish-{{ $onefish->id }}')"
                                    >
                                        Editar
                                    </button>
                                    <button
                                        type="button"
                                        class="aqua-action-button aqua-action-delete"
                                        x-on:click.prevent="$dispatch('open-modal', 'delete-fish-{{ $onefish->id }}')"
                                    >
                                        Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="aqua-table-footer">
                Cada peixe tem seu espaço. Cada detalhe, seu lugar.
            </div>
        </section>

        @foreach ($fish as $onefish)
            <x-modal name="edit-fish-{{ $onefish->id }}" maxWidth="lg" focusable>
                <form class="auth-form aqua-modal-form" action="{{ route('fish.update', $onefish)}}" method="POST">
                    @method("put")

                    <div class="aqua-modal-heading"> 
                        <span class="auth-kicker">EDITAR PEIXE</span>
                        <h2>Atualizar {{ $onefish->name }}</h2>
                        <p>Altere os dados que desejar e confirme a edição.</p>
                    </div>

                    <div>
                        <label for="edit-fish-name-{{ $onefish->id }}">Nome do peixe</label>
                        <input
                            id="edit-fish-name-{{ $onefish->id }}"
                            name="name"
                            type="text"
                            class="auth-input"
                            value="{{ $onefish->name }}"
                            required
                        >
                    </div>

                    <div class="aqua-field-row">
                        <div>
                            <label for="edit-fish-color-{{ $onefish->id }}">Cor</label>
                            <input
                                id="edit-fish-color-{{ $onefish->id }}"
                                name="color"
                                type="text"
                                class="auth-input"
                                value="{{ $onefish->color }}"
                                required
                            >
                        </div>

                        <div>
                            <label for="edit-fish-category-{{ $onefish->id }}">Categoria</label>
                            <select
                                id="edit-fish-category-{{ $onefish->id }}"
                                name="type_id"
                                class="auth-input"
                                required
                            >
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected($onefish->type_id == $type->id)>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="aqua-modal-actions">
                        <button
                            type="button"
                            class="aqua-button-secondary"
                            x-on:click="$dispatch('close')"
                        >
                            Cancelar
                        </button>
                        <button type="submit" class="aqua-button">Salvar alterações</button>
                    </div>
                </form>
            </x-modal>

            <x-modal name="delete-fish-{{ $onefish->id }}" maxWidth="md" focusable>
                <div class="aqua-modal-form aqua-delete-modal">
                    <span class="aqua-delete-symbol" aria-hidden="true">!</span>
                    <div class="aqua-modal-heading">
                        <span class="auth-kicker">EXCLUIR PEIXE</span>
                        <h2>Excluir {{ $onefish->name }}?</h2>
                        <p>Esta ação removerá o peixe do catálogo. Confirme para continuar.</p>
                    </div>

                    <form method="POST" action="{{ route('fish.destroy', $onefish) }}">
                        @csrf
                        @method('DELETE')

                        <div class="aqua-modal-actions">
                            <button
                                type="button"
                                class="aqua-button-secondary"
                                x-on:click="$dispatch('close')"
                            >
                                Cancelar
                            </button>

                            <button type="submit" class="aqua-button-danger">
                                Sim, excluir
                            </button>
                        </div>
                    </form>
                </div>
            </x-modal>
        @endforeach

        {{-- ========== CADASTRAR PEIXE ========== --}}
        <section
            x-show="tab === 'peixes'"
            x-cloak
            class="aqua-panel"
            aria-labelledby="fish-title"
        >
            <div class="aqua-panel-heading">
                <div>
                    <span class="auth-kicker">MAIS VIDA NO SEU CATÁLOGO</span>
                    <h2 id="fish-title">Cadastrar peixe</h2>
                    <p>Preencha as informações do peixe e escolha sua categoria.</p>
                </div>
                <span class="aqua-badge">Novo peixe</span>
            </div>

            <div class="aqua-form-layout">
                <form
                    class="auth-form aqua-entry-form"
                    action="{{ route('fish.store') }}"
                    method="POST"
                >
                    <div>
                        <label for="fish-name">
                            Nome do peixe <span aria-hidden="true">*</span>
                        </label>
                        <input
                            id="fish-name"
                            name="name"
                            type="text"
                            class="auth-input"
                            placeholder="Ex.: Betta"
                            required
                        >
                    </div>

                    <div class="aqua-field-row">
                        <div>
                            <label for="fish-color">
                                Cor <span aria-hidden="true">*</span>
                            </label>
                            <input
                                id="fish-color"
                                name="color"
                                type="text"
                                class="auth-input"
                                placeholder="Ex.: Azul"
                                required
                            >
                        </div>

                        <div>
                            <label for="fish-category">
                                Categoria <span aria-hidden="true">*</span>
                            </label>
                            <select
                                id="fish-category"
                                name="type_id"
                                class="auth-input"
                                required
                            >
                                <option value="" disabled selected>Selecione uma categoria</option>

                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p class="aqua-field-help">
                        * Campos obrigatórios. As categorias disponíveis nesta prévia são ilustrativas.
                    </p>

                    <div class="aqua-form-actions">
                        <button type="reset" class="aqua-button-secondary">Limpar campos</button>
                        <button type="submit" class="aqua-button">Salvar peixe</button>
                    </div>

                    <p class="aqua-layout-note">
                        Prévia de layout: o salvamento ainda não está conectado.
                    </p>
                </form>

                <aside class="aqua-form-aside">
                    <span class="aqua-aside-symbol" aria-hidden="true">≈</span>
                    <h3>Os detalhes fazem a diferença.</h3>
                    <p>Use um nome fácil de identificar e informe a cor predominante do peixe.</p>
                    <a href="#categorias">Precisa de uma categoria? Crie aqui →</a>
                </aside>
            </div>
        </section>

        {{-- ========== CADASTRAR CATEGORIA ========== --}}
        <section
            x-show="tab === 'categorias'"
            x-cloak
            class="aqua-panel"
            aria-labelledby="category-title"
        >
            <div class="aqua-panel-heading">
                <div>
                    <span class="auth-kicker">ORGANIZE POR TIPO</span>
                    <h2 id="category-title">Cadastrar categoria</h2>
                    <p>Crie os tipos que vão organizar os peixes do seu catálogo.</p>
                </div>
                <a href="{{ route('types.index') }}" class="aqua-button-secondary">Gerenciar categorias</a>
            </div>

            <div class="aqua-form-layout">
                <form class="auth-form aqua-entry-form" action="{{ route('types.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="category-name">
                            Nome da categoria <span aria-hidden="true">*</span>
                        </label>
                        <input
                            id="category-name"
                            name="name"
                            type="text"
                            class="auth-input"
                            placeholder="Ex.: Água doce"
                            required
                        >
                        <p class="aqua-field-help">
                            Escolha um nome curto e fácil de reconhecer.
                        </p>
                    </div>

                    <div class="aqua-form-actions">
                        <button type="reset" class="aqua-button-secondary">Limpar campos</button>
                        <button type="submit" class="aqua-button">Salvar categoria</button>
                    </div>

                    <p class="aqua-layout-note">
                        Prévia de layout: o salvamento ainda não está conectado.
                    </p>
                </form>

                <aside class="aqua-form-aside">
                    <span class="aqua-aside-symbol" aria-hidden="true">≋</span>
                    <h3>Tudo no seu lugar.</h3>
                    <p>As categorias representam os tipos de peixe e ajudam a manter o catálogo organizado.</p>
                    <a href="#catalogo">Conhecer o catálogo →</a>
                </aside>
            </div>
        </section>

    </div>
</x-app-layout>
