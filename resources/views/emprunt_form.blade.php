@extends('layouts.app')

@section('title', 'reservation')

@section('content')
<div class="grid grid-cols-1 gap-2 ">
    @if ($errors->has('error'))
        <p class="w-full bg-red-300 text-red-700 border border-red-700 p-3">{{ $errors->first('error')}}</p>
    @endif

    @if (session('success'))
        <p class="w-full bg-green-300 text-green-700 border border-green-700 p-3">{{session('success')}}</p>
    @endif
    @foreach ($books as $book)
        <form action="{{ route('emprunt.store') }}" method="post" class="" >
        @csrf

        @if ($book->status != 'borrowed')
            <div class=" rounded-lg border border-black flex h-14 shadow-slate-400  shadow-sm ">

            <div class="">
                <img src="{{ $book->image_url }}" alt="cover book" class="h-full w-[80px]" >
            </div>

            <div class=" w-full p-2 text-center">
                <p>{{$book->title }}</p>
                <input type="hidden" name="book_id" value="{{ $book->id }}">
            </div>
            <div class="flex ml-auto">
                <div class="">
                    <select name="user_id" id="users"
                    required
                    class="h-full">
                        <option value="">Sélectionner l'emprunteur</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>

                        @endforeach
                    </select>
                </div>
                    <button type="submit" class="bg-blue-600 p-4 h-full rounded-r-lg hover:bg-blue-500"  >Valider
                    </button>
                </div>
            </div>
        @else
        <div class=" rounded-lg border border-black flex h-14 shadow-slate-400 shadow-sm line-through ">

            <div class="">
                <img src="{{ $book->image_url }}" alt="cover book" class="h-full w-[80px]" >
            </div>

            <div class=" w-full p-2 text-center">
                <p>{{$book->title }}</p>
                <input type="hidden" name="book_id" value="{{ $book->id }}">
            </div>
            <div class="flex ml-auto">
                <div class="">
                    <select name="user_id" id="users"
                    required
                    class="h-full" disabled>
                        <option value="">Sélectionner l'emprunteur</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>

                        @endforeach
                    </select>
                </div>
                    <button type="submit" class="bg-gray-400 p-4 h-full rounded-r-lg " disabled  >Valider
                    </button>
                </div>
            </div>
        @endif
        </form>
    @endforeach
</div>
@endsection
