@extends('layouts.app')

@section('title', 'books')

@section('content')
<div class="mt-9 flex flex-col items-center justify-center">
    <h1 class="text-center font-bold text-3xl mb-6 ">Résultats trouvés : <span class="text-cyan-700">{{ $query }}</span></h1>

    @if (session('success'))
        <p class="w-full bg-green-300 text-green-700 border border-green-700 p-3">{{session('success')}}</p>
    @endif

    @if ($errors->has('error'))
        <p class="w-full bg-red-300 text-red-700 border border-red-700 p-3">{{ $errors->first('error')}}</p>
    @endif

    @if (isset($books['items']) && !empty($books['items']))


        <div class=" grid items-stretch grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2 p-4">
            @foreach ($books['items'] as $book)
            <x-card :image="$book['volumeInfo']['imageLinks']['thumbnail'] ?? '' "
            :title="$book['volumeInfo']['title'] ?? 'Titre indisponible' "
            :description="substr($book['volumeInfo']['description'] ?? 'Aucune description', 0, 30) . '...' "
            :author="implode(', ', $book['volumeInfo']['authors'] ?? []) "
            :published="substr($book['volumeInfo']['publishedDate'] ?? 'N/A', 0, 4) "

            :action="route('book.store', ['id' => $book['id']])"
            />
            @endforeach
        </div>
    @else
        <p>Aucun livre a été trouver</p>
    @endif
</div>
@endsection

