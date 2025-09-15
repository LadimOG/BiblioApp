@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 gap-2 w-[500px]">
        @if (session('success'))
            <p class="w-full bg-green-300 text-green-700 border border-green-700 p-3">{{session('success')}}</p>
        @endif
        @foreach ($borrowings as $borrowing)
        <div class="border ">
            <form action="{{ route('emprunt.update', $borrowing->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir confirmer le retour de ce livre ?')"
                class="flex justify-between bg-slate-800 rounded-md">
            @csrf
                <div class="flex">
                    <div class="">
                        <img src="{{$borrowing->book->image_url}}" alt="cover book"
                        width="50px">
                    </div>
                    <div class="px-2">
                        <h3 class="font-bold mr-2 text-white">{{$borrowing->book->title}}</h3>
                        <p class="mr-2 text-white"><span class="font-semibold text-gray-500">Prêté à: </span>{{$borrowing->user->name}}</p>
                        <p class="text-white"><span class="font-semibold text-gray-500">Le: </span>{{$borrowing->borrowed_at}}</p>
                    </div>
                </div>

                <button class="bg-blue-600 p-4 rounded-r-md hover:bg-blue-400 text-white font-bold" type="submit">Rendre</button>

            </form>
        </div>
        @endforeach
    </div>
@endsection