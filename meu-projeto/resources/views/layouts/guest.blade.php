<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aqua · Gestão de peixes</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <main class="auth-shell">
        <section class="auth-ocean" aria-label="Aqua, gestão de peixes">
            <a href="{{ url('/') }}" class="auth-brand"> aqua</a>
            <div class="auth-story">
                <span class="auth-eyebrow">UM NOVO OLHAR PARA O SEU AQUÁRIO</span>
                <h1>Um universo de peixes.<br><em>Tudo no seu lugar.</em></h1>
                <p>Seu espaço para organizar peixes e suas espécies, com mais clareza e simplicidade.</p>
                <div class="auth-art" aria-hidden="true">
                    <svg viewBox="0 0 520 260" fill="none"><circle cx="260" cy="130" r="113" stroke="currentColor" stroke-opacity=".13"/><circle cx="260" cy="130" r="83" stroke="currentColor" stroke-opacity=".1"/><path d="M110 130C174 40 294 40 361 130C294 220 174 220 110 130Z" fill="#8edacb"/><path d="M353 130L425 70V190L353 130Z" fill="#4aa99c"/><path d="M221 64L275 31L293 74M221 196L275 229L293 186" fill="#4aa99c"/><path d="M253 77C284 110 284 150 253 183" stroke="#125b60" stroke-width="3"/><circle cx="169" cy="121" r="7" fill="#123d48"/><path d="M111 144Q136 149 144 139" stroke="#125b60" stroke-width="3" stroke-linecap="round"/><circle cx="98" cy="71" r="8" stroke="#8edacb" stroke-width="2"/><circle cx="77" cy="40" r="4" stroke="#8edacb" stroke-width="2"/><path d="M58 219Q87 207 116 219T174 219M356 38Q377 28 398 38T440 38" stroke="#8edacb" stroke-opacity=".4" stroke-width="2" stroke-linecap="round"/></svg>
                    <span>Cada espécie tem seu espaço.</span>
                </div>
                <div class="auth-topics"><span>01 &nbsp; Peixes</span><span>02 &nbsp; Tipos de peixe</span></div>
            </div>
            <span class="auth-ocean-footer">Organização que flui.</span>
        </section>
        <section class="auth-content">
            <div class="auth-form-wrap">{{ $slot }}</div>
            <footer class="auth-footer">Aqua &copy; {{ date('Y') }} <span>Seu catálogo, em harmonia.</span></footer>
        </section>
    </main>
</body>
</html>
