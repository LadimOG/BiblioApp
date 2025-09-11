@extends('layouts.app')

@section('title', 'BiblioApp')


@section('content')

    <div class=" flex justify-center items-center flex-col w-[500px] ">
        <h1 class="font-bold mb-6 text-3xl">Cherchez votre livre</h1>


        <form action="{{ route('index.books') }}" method="get" class="w-full">
            @csrf
            <div class="flex items-center w-full h mb-5 shadow-xl">
                <input type="search" name="search" id="search" class="outline-indigo-400 bg-slate-300 rounded-s-lg border-none w-4/5" placeholder="Taper le nom du livre ou de l'auteur...">

                <button type="submit" class="bg-blue-500 p-2 rounded-e-lg text-white w-1/4 " >Rechercher</button>
            </div>

        </form>

        @if (session('success'))

            <p class="w-full bg-green-300 text-green-700 border border-green-700 p-3">{{session('success')}}</p>
        @endif
        @if (session('error'))
            <p class="w-full bg-red-300 text-red-700 border border-red-700 p-3">{{session('error')}}</p>
        @endif
    </div>


@endsection