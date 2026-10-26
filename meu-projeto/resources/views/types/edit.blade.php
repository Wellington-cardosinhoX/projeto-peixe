<x-app-layout>
    <div class="aqua-workspace">
        <section class="aqua-panel">
            <div class="aqua-panel-heading">
                <div><span class="auth-kicker">ATUALIZAR CATEGORIA</span><h2>Editar {{ $type->name }}</h2><p>A alteração do nome aparecerá nos peixes vinculados.</p></div>
            </div>
            <form class="auth-form aqua-entry-form" method="POST" action="{{ route('types.update', $type) }}">
                @csrf
                @method('PUT')
                @include('types.form')
            </form>
        </section>
    </div>
</x-app-layout>
