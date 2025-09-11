@extends('layouts.app')

@section('title', 'books')

@section('content')
<div class="mt-9">
    <h1 class="text-center font-bold text-3xl mb-6 ">Résultats trouvés : <span class="text-cyan-700">{{ $query }}</span></h1>

    @if (isset($books['items']) && !empty($books['items']))

        <div class="grid items-stretch h-full grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
            @foreach ($books['items'] as $book)
                <div class="border h-full bg-slate-800 rounded-md p-4 hover:bg-slate-700">
                    <div class="rounded-md bg-black h-44">
                        @if (isset($book['volumeInfo']['imageLinks']))
                            <div class="h-full justify-items-center">
                                <img src="{{$book['volumeInfo']['imageLinks']['thumbnail']}}" alt="" class="h-full">
                            </div>
                        @else
                            <div class="bg-black h-full flex items-center justify-center">
                                <span class="text-white text-xs text-center p-2">Image non disponible</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col mt-5 ">
                        <div class="min-h-[140px]">
                            <h5 class="text-lg font-semibold text-white">{{$book['volumeInfo']['title'] ?? 'Aucun titre'}}</h5>

                        <p class="text-white text-sm mb-2"><span class="font-bold text-slate-400">Description: </span>{{
                            substr($book['volumeInfo']['description'] ?? 'Aucune description',0,30).'...'}}
                        </p>

                        <p class="text-white text-sm mb-2"><span class="font-bold text-slate-400">Auteur: </span>{{ implode(', ',$book['volumeInfo']['authors']?? []) }}</p>

                        <p class="text-white text-sm mb-2"><span class="font-bold text-slate-400">Année: </span>{{substr($book['volumeInfo']['publishedDate'] ?? 'N/A', 0, 4)
                        }}</p>
                        </div>


                        <form action="{{ route('books.add',['id'=>$book['id']] ) }}" method="post" >
                        @csrf
                        <div class=" flex justify-center items-center gap-2">
                            <label class="font-bold text-slate-400" for="condition" >État du livre:</label>
                            <select name="condition" id="condition"
                             class="rounded-md bg-slate-500 text-white cursor-pointer" required>
                                <option value="">
                                Sélectionner l'état du livre
                                 </option>
                                <option value="bon">
                                Bon
                                </option>
                                <option value="moyen">Moyen
                                 </option>
                                <option value="mauvais">
                                 Mauvais
                                </option>
                             </select>
                        </div>

                            <div class="mt-5  ">
                                 <button type="submit" class="inline-block p-4 bg-blue-600 w-1/2 rounded-md text-center font-bold text-white
                                 hover:bg-blue-500">
                                Ajouter
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            @endforeach

        </div>

    @else
        <p>Aucun livre a été trouver</p>
    @endif
</div>
@endsection

