<x-app-layout>
    <div class="aqua-workspace" x-data="{}">
        @if (session('success'))
            <p class="aqua-demo-note" role="status">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="aqua-demo-note" role="alert">{{ session('error') }}</p>
        @endif

        <section class="aqua-panel" aria-labelledby="types-title">
            <div class="aqua-panel-heading">
                <div>
                    <span class="auth-kicker">ORGANIZE SEU CATÁLOGO</span>
                    <h2 id="types-title">Categorias de peixes</h2>
                    <p>Consulte, edite e gerencie os tipos do seu catálogo.</p>
                </div>
                <a href="{{ route('types.create') }}" class="aqua-button">+ Cadastrar categoria</a>
            </div>
            <div class="aqua-table-scroll">
                <table class="aqua-table">
                    <caption class="sr-only">Categorias cadastradas e suas ações</caption>
                    <thead>
                        <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">Peixes vinculados</th>
                            <th scope="col" class="aqua-actions-heading">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                            <tr>
                                <td><strong>{{ $type->name }}</strong></td>
                                <td>{{ $type->fish_count }}</td>
                                <td>
                                    <div class="aqua-table-actions">
                                        <a href="{{ route('types.show', $type) }}" class="aqua-action-button aqua-action-edit">Visualizar</a>
                                        <a href="{{ route('types.edit', $type) }}" class="aqua-action-button aqua-action-edit">Editar</a>
                                        <button type="button" class="aqua-action-button aqua-action-delete" x-on:click="$dispatch('open-modal', 'delete-type-{{ $type->id }}')">Excluir</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3">Nenhuma categoria cadastrada. Cadastre a primeira para organizar seus peixes.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        @foreach ($types as $type)
            <x-modal name="delete-type-{{ $type->id }}" maxWidth="md" focusable>
                <div class="aqua-modal-form aqua-delete-modal" role="dialog" aria-modal="true" aria-labelledby="delete-type-title-{{ $type->id }}">
                    <span class="aqua-delete-symbol" aria-hidden="true">!</span>
                    <div class="aqua-modal-heading">
                        <h2 id="delete-type-title-{{ $type->id }}">Excluir {{ $type->name }}?</h2>
                        @if ($type->fish_count > 0)
                            <p>Esta categoria possui {{ $type->fish_count }} peixe(s). Altere a categoria deles antes de excluir.</p>
                        @else
                            <p>A categoria será removida do catálogo. Esta ação não pode ser desfeita.</p>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('types.destroy', $type) }}">
                        @csrf
                        @method('DELETE')
                        <div class="aqua-modal-actions">
                            <button type="button" class="aqua-button-secondary" x-on:click="$dispatch('close')">Cancelar</button>
                            @if ($type->fish_count === 0)
                                <button type="submit" class="aqua-button-danger">Sim, excluir</button>
                            @endif
                        </div>
                    </form>
                </div>
            </x-modal>
        @endforeach
    </div>
</x-app-layout>
