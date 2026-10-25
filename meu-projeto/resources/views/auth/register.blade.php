<x-guest-layout>
    <span class="auth-kicker">SEU CATÁLOGO COMEÇA AQUI</span>
    <h2 class="auth-title">Vamos mergulhar?</h2>
    <p class="auth-description">Crie sua conta e dê um novo lar às suas ideias.</p>
    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf
        <div>
            <x-input-label for="name" value="Nome completo" />
            <x-text-input id="name" class="auth-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Como podemos te chamar?" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password" value="Senha" />
            <x-text-input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" placeholder="Crie uma senha" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password_confirmation" value="Confirme sua senha" />
            <x-text-input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repita a senha" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <button type="submit" class="auth-submit">Criar minha conta <span aria-hidden="true">→</span></button>
    </form>
    <p class="auth-switch">Já faz parte? <a href="{{ route('login') }}">Entrar na conta</a></p>
</x-guest-layout>
