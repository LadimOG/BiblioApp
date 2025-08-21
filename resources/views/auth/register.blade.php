@extends('layouts.app')

@section('name')

@section('content')
    <div class="flex flex-col w-[500px] p-full py-5 px-5 rounded-lg bg-slate-800">
        <div class="text-center font-bold text-2xl text-white mb-9">
            <h1>Créer votre compte</h1>
        </div>
        <form action="{{ url('/register')}}" method="post">
            @csrf
            <div class="flex flex-col mb-5">
                <label for="name" class="font-bold text-sm text-white mb-2">Prénom :</label>
                <input class="rounded-md" type="text" name="name" id="name" placeholder="votre prenom">
            </div>
            <div class="flex flex-col mb-5">
                <label for="email" class="font-bold text-sm text-white mb-2">email :</label>
                <input class="rounded-md" type="email" name="email" id="email" placeholder="exemple@mail.com">
            </div>
            <div class="flex flex-col mb-5">
                <label for="password" class="font-bold text-sm text-white mb-2">Mot de passe :</label>
                <input class="rounded-md" type="password" name="password" id="password">
            </div>
            <div class="flex flex-col mb-5">
                <label for="password_confirmation" class="font-bold text-sm text-white mb-2">Confirmer le mot de passe :</label>
                <input class="rounded-md" type="password" name="password_confirmation" id="password_confirmation">
            </div>

            <button type="submit" class="inline-block w-full bg-blue-700 rounded-md text-white text-center font-bold text-sm p-3 mt-9 hover:bg-blue-500">Enregister</button>

        </form>
    </div>

@endsection