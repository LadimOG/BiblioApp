@extends('layouts.app')

@section('title', 'reservation')

@section('content')
    <div class="grid grid-cols-1 gap-2 ">
        @foreach ($books as $book)
        <form action="" method="post" class="" >
            <div class=" rounded-lg  flex h-14 shadow-slate-500  shadow-sm ">

                <div class="">
                    <img src="{{ $book->image_url }}" alt="cover book" class="h-full w-[80px]" >
                </div>

                <div class="border border-slate-600 w-full p-2 text-center">
                    <p>{{$book->title }}</p>
                </div>
                <div class="flex ml-auto">
                    <input type="date" name="date" id="date"
                    class="block h-full " >
                    <button type="submit" class="bg-blue-600 p-4 h-full rounded-r-lg">Valider</button>
                </div>
            </div>
        </form>

        @endforeach
    </div>
@endsection
