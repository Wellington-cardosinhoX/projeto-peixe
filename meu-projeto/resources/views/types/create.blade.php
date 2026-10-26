<x-app-layout>
    <div class="aqua-workspace">
        <section class="aqua-panel">
            <div class="aqua-panel-heading">
                <div><span class="auth-kicker">ORGANIZE POR TIPO</span><h2>Cadastrar categoria</h2><p>Crie um tipo para organizar seus peixes.</p></div>
            </div>
            <form class="auth-form aqua-entry-form" method="POST" action="{{ route('types.store') }}">
                @csrf
                @include('types.form')
            </form>
        </section>
    </div>
</x-app-layout>
