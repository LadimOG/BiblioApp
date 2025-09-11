@extends('layouts.app')

@section('title', 'reservation')

@section('content')
<div class="grid grid-cols-1 gap-2 ">
    @foreach ($books as $book)
        <form action="{{ route('emprunt.store') }}" method="post" class="" >
        @csrf
        <div class=" rounded-lg border border-black  flex h-14 shadow-slate-400  shadow-sm ">

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

                <button type="submit" class="bg-blue-600 p-4 h-full rounded-r-lg">Valider</button>
            </div>
        </div>
        </form>
    @endforeach
</div>
@endsection
