<x-app-layout>
    <div class="aqua-workspace">
        <section class="aqua-panel">
            <div class="aqua-panel-heading">
                <div><span class="auth-kicker">DETALHES DA CATEGORIA</span><h2>{{ $type->name }}</h2><p>{{ $type->fish->count() }} peixe(s) nesta categoria.</p></div>
                <div class="aqua-table-actions">
                    <a href="{{ route('types.index') }}" class="aqua-button-secondary">Voltar</a>
                    <a href="{{ route('types.edit', $type) }}" class="aqua-button">Editar categoria</a>
                </div>
            </div>
            <div class="aqua-table-scroll">
                <table class="aqua-table">
                    <caption class="sr-only">Peixes vinculados à categoria</caption>
                    <thead><tr><th scope="col">Peixe</th><th scope="col">Cor</th></tr></thead>
                    <tbody>
                        @forelse ($type->fish as $fish)
                            <tr><td><strong>{{ $fish->name }}</strong></td><td>{{ $fish->color }}</td></tr>
                        @empty
                            <tr><td colspan="2">Nenhum peixe vinculado a esta categoria.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>
