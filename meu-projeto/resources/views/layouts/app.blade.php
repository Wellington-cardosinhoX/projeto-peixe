<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Aqua · Meu catálogo</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased aqua-app">
        @include('layouts.navigation')
        @isset($header)
            <header class="aqua-page-header">{{ $header }}</header>
        @endisset
        <main>{{ $slot }}</main>
        <footer class="aqua-app-footer"><span>Aqua &copy; {{ date('Y') }}</span><span>Organização que flui.</span></footer>
    </body>
</html>
