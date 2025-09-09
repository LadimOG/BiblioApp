<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body class="flex flex-col min-h-screen box-border">
    <header>
        <nav class="flex justify-between border border-y-1 shadow-md">
            <div class="flex  justify-center items-center ">
                <a href="/" class=" flex items-center text-xl font-bold text-cyan-600 ">
                <img src="./images/livres.png" alt="logo du site" width="40px">
                Biblio-App</a>
            </div>
            <div class="p-2">
                <ul class="flex justify-center items-center gap-2">
                    @auth
                    <li>
                        <form action="{{ route('books.all') }}" method="get">
                            @csrf
                            <button class="font-bold text-white bg-blue-500 p-2 rounded-md" type="submit">Ma bibliothèque</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="font-bold text-white bg-blue-500 p-2 rounded-md" type="submit">Se déconnecter</button>
                        </form>
                    </li>
                    @else
                    <li>

                    </li>
                        <a href="{{ url('/login')}}" class="font-bold text-white bg-blue-500 p-2 rounded-md">Se connecter</a>
                    <li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <main class="flex flex-grow justify-center items-center">
        @yield('content')
    </main>

    <footer class=" border text-center min-h-[70px]  flex justify-center items-center ">
        <div class="">
            <p>&copy; 2025 Mon application de livres</p>
        </div>
    </footer>
</body>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</html>