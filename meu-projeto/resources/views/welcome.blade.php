<x-guest-layout>
    <span class="auth-kicker">BEM-VINDO AO AQUA</span>
    <h2 class="auth-title">Seu catálogo começa<br>com um mergulho.</h2>
    <p class="auth-description">Um espaço dedicado à diversidade dos peixes. Reúna informações e organize cada espécie do seu jeito.</p>

    <div class="welcome-features">
        <article class="welcome-feature">
            <span class="welcome-feature-number" aria-hidden="true">01</span>
            <div>
                <h3>Peixes</h3>
                <p>Cada peixe com sua história e suas características em um só lugar.</p>
            </div>
        </article>
        <article class="welcome-feature">
            <span class="welcome-feature-number" aria-hidden="true">02</span>
            <div>
                <h3>Tipos de peixe</h3>
                <p>Um catálogo organizado por tipos para conhecer melhor cada espécie.</p>
            </div>
        </article>
    </div>

    <div class="welcome-actions">
        @auth
            <a href="{{ route('dashboard') }}" class="auth-submit">Acessar meu painel <span aria-hidden="true">→</span></a>
            <p class="welcome-note">Olá, {{ Auth::user()->name }}. Bom ter você por aqui.</p>
        @else
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="auth-submit">Criar minha conta <span aria-hidden="true">→</span></a>
            @endif
            @if (Route::has('login'))
                <p class="auth-switch">Já tem uma conta? <a href="{{ route('login') }}">Entrar no Aqua</a></p>
            @endif
        @endauth
    </div>
</x-guest-layout>
