@extends('layouts.app')

@section('content')
    <div class="">
        @if (session('success'))
            <p class="w-full bg-green-300 text-green-700 border border-green-700 p-3">{{session('success')}}</p>
        @endif
        @foreach ($borrowings as $borrowing)
        <div class="">
            <form action="{{ route('emprunt.update', $borrowing->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir confirmer le retour de ce livre ?');">
            @csrf
            <div class="">
                <h3>{{$borrowing->book->title}}</h3>
                <p>{{$borrowing->user->name}}</p>
                <p>{{$borrowing->borrowed_at}}</p>
            </div>
                <input type="hidden" name="id" value="{{ $borrowing->id }}">
                <div class="">
                    <button type="submit">Rendre</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
@endsection