<x-guest-layout>
    <span class="auth-kicker">BEM-VINDO DE VOLTA</span>
    <h2 class="auth-title">Bom te ver por aqui.</h2>
    <p class="auth-description">Entre na sua conta e mergulhe no seu catálogo.</p>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password" value="Senha" />
            <x-text-input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua senha" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="auth-options">
            <label for="remember_me" class="auth-remember"><input id="remember_me" type="checkbox" name="remember"> Lembrar de mim</label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
            @endif
        </div>
        <button type="submit" class="auth-submit">Entrar na conta <span aria-hidden="true">→</span></button>
    </form>
    @if (Route::has('register'))
        <p class="auth-switch">Ainda não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></p>
    @endif
</x-guest-layout>
