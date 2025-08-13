@extends('layouts.app')

@section('title', 'books')

@section('content')
<div>

    <h1 class="text-center font-bold text-3xl">Résultat recherche ...</h1>
    @if (isset($books['items']))


    <div class="justify-center items-center mx-2 grid gap-1 sm:grid-cols-1  md:grid-cols-2 lg:grid-cols-4 ">
        @foreach ($books['items'] as $book)
            <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-4">
            @isset($book['volumeInfo']['imageLinks']['smallThumbnail'])
                <img src="{{ $book['volumeInfo']['imageLinks']['smallThumbnail'] }}" alt="">
            @endisset

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $book['volumeInfo']['title']}}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Auteur: {{implode(', ', $book['volumeInfo']['authors']?? [])}}</p>
            @isset($book['volumeInfo']['description'])
                <p class="text-gray-300">Description: {{substr($book['volumeInfo']['description'], 0,100).'...'}}</p>
            @endisset

                <p class="text-gray-700">Année de publication: {{$book['volumeInfo']['publishedDate']?? 'N/A'}}</p>

                <a href="{{ route('books.add', ['id' => $book['id']]) }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                    Ajouter
                </a>

            </div>
        @endforeach
    </div>
    @else
    <p>Aucun livre trouvé !</p>
    @endif


</div>
@endsection

