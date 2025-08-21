@extends('layouts.app')

@section('title', 'Login')


@section('content')


    <div class="flex flex-col w-[500px] p-full py-5 px-5 rounded-lg bg-slate-800">
        <h1 class="text-center font-bold text-2xl text-white mb-5">Connexion</h1>
        <form action="{{ route('login')}}" method="post">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="email" class="text-white font-bold mb-2">email</label>
                <input type="email" name="email" id="email" placeholder="exemple@mail.com" class="rounded-md">
            </div>
            <div class="flex flex-col mb-4">
                <label for="password" class="text-white font-bold mb-2">password</label>
                <input type="password" name="password" id="password" placeholder="mot de passe..." class="rounded-md">
            </div>

            <div class="flex items-center justify-between mt-9">
                <button type="submit" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Connexion</button>
                <a href="{{route('register')}} " class="text-gray-300 inline-block  font-bold text-sm hover:text-gray-200">Créer un compte</a>
            </div>
        </form>

    </div>

@endsection
