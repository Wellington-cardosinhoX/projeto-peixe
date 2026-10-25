<nav class="aqua-nav" aria-label="Navegação principal">
    <a href="{{ route('dashboard') }}" class="auth-brand"><span aria-hidden="true">≈</span> aqua<span class="auth-brand-dot">.</span></a>
    <div class="aqua-nav-links">
        <a href="{{ route('dashboard') }}#catalogo">Catálogo</a>
        <a href="{{ route('dashboard') }}#peixes">Cadastrar peixe</a>
        <a href="{{ route('dashboard') }}#categorias">Categorias</a>
    </div>
    <div class="aqua-account">
        <a href="{{ route('profile.edit') }}" class="aqua-user">{{ Auth::user()->name }}</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="aqua-logout">Sair ↗</button>
        </form>
    </div>
</nav>
