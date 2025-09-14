@extends('layouts.app')

@section('content')
    <div class="">
        @foreach ($borrowings as $borrowing)
        <div class="">
            <div class="">
                <h3>{{$borrowing->book->title}}</h3>
                <p>{{$borrowing->user->name}}</p>
                <p>{{$borrowing->borrowed_at}}</p>
            </div>
            <form action="" method="post">
                <div class="">
                    <label for="returned_at"></label>
                    <input type="checkbox" name="returned_at" id="returned_at"
                    value="{{ $borrowing->id }}"
                    >
                </div>
                <div class="">
                    <button type="submit">Rendre</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
@endsection