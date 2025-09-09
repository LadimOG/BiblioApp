@extends('layouts.app')

@section('content')
    <div class="">
        <div class="flex justify-center items-center mt-9 mb-5">
            <h1 class="font-bold text-3xl">Mes livres</h1>
        </div>

        <div class="grid items-stretch  grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 ">
            @if ($books->count() > 0)
                @foreach ($books as $book)
                <div class=" cursor-pointer bg-slate-800 rounded-md hover:bg-slate-700 p-4 mx-2">
                    <div class="bg-black   rounded-md h-44 flex justify-center items-center justify-items-center">
                        @if (isset($book->image_url))
                          <img src="{{$book->image_url}}" alt="image couverture" class=""  >
                        @else
                        <p class="text-gray-300">image non disponible</p>
                        @endif
                    </div>

                    <div class="text-slate-300 p-2 min-h-[190px] ">
                        <h5 class="font-bold text-2xl  mb-2">{{$book->title}}</h5>
                        {{-- <p class="mb-2">
                            <span class="font-bold text-slate-500">Description: </span>
                            {{ $book->description }}
                        </p> --}}

                        <p class="mb-2">
                            <span class="font-bold text-slate-500">Auteur: </span>{{$book->author}}
                        </p>
                        <p class="mb-2">
                            <span class="font-bold text-slate-500">Année: </span>{{$book->published_year}}
                        </p>

                        <p class="mb-5">
                            <span class="font-bold text-slate-500">Etat du livre: </span>
                            {{$book->condition ?? 'null'}}

                        </p>

                    </div>
                    <div class="">
                        <a href="{{ route('delete.book',['id' => $book->id])}}" class="bg-blue-500 inline-block w-full md:w-1/2 text-center text-white text-lg rounded-md p-2 ">Retirer</a>
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
