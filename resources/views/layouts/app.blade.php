<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="flex justify-between border border-y-1 shadow-md">
            <div class="logo flex justify-start items-center">
                <img src="./images/livres.png" alt="" width="40px">
                <a href="/"><h2 class="text-xl font-bold text-cyan-700">Biblio-App</h2></a>
            </div>
            <div class="px-2">
                <ul class="flex justify-center gap-2">
                    <a href="#"><li>Accueil</li></a>
                    <a href="#"><li>Ajouter</li></a>
                </ul>
            </div>
        </nav>
    </header>

    <main >
        @yield('content')
    </main>

    <footer class="">
        <p>&copy; 2025 Mon application de livres</p>
    </footer>
</body>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</html>