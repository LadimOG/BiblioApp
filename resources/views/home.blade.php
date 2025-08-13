@extends('layouts.app')

@section('title', 'BiblioApp')


@section('content')
    <div class="">
        <h1>Trouver votre livre</h1>

        <form action="{{ route('book') }}" method="get">
            @csrf
            <input type="search" name="search" id="search" placeholder="Germinal">

            <button type="submit">Rechercher</button>
        </form>
    </div>
@endsection