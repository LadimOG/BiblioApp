@extends('layouts.app')

@section('content')
    <div class="">
        <div class="flex justify-center items-center mt-10">
            <h1 class="font-bold text-3xl">Mes livres</h1>
        </div>

        <div class="grid grid-col-1 w-[500px] gap-3 mt-9">
            @if ($books->count() > 0)
                @foreach ($books as $book)
                <div class="h-full bg-slate-800 rounded-md hover:bg-slate-700 ">
                    <div class="bg-gray-500 place-items-center rounded-t-md">
                        <img src="{{$book->image_url}}" alt="">
                    </div>
                    <div class="text-slate-300 p-2">
                        <h5 class="font-bold text-center text-2xl  mb-2">{{$book->title}}</h5>
                        {{-- <p class="mb-2">
                            <span class="font-bold text-slate-500">Description: </span>
                            {{ $book->description }}
                        </p> --}}

                        <p class="mb-2">
                            <span class="font-bold text-slate-500">Auteur: </span>{{$book->author}}
                        </p>
                        <p class="mb-5">
                            <span class="font-bold text-slate-500">Année: </span>{{$book->published_year}}
                        </p>
                        <a href="{{ route('delete.book',['id' => $book->id])}}" class="bg-blue-500 inline-block w-1/2 text-center text-white text-lg rounded-md p-2">Retirer</a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="flex justify-center items-center">
                    <p class="text-red-500 text-2xl">Aucun livre enregistré dans votre bibliothèque !</p>
                </div>

            @endif
        </div>

    </div>
        @endsection
