@props(['book'])
<div class="bg-slate-800 p-2 h-[450px] rounded-md">
    <div class="flex item-center justify-center h-44 bg-black p-1 m-2 rounded-md">
        @if (isset($book['volumeInfo']['imageLinks']['thumbnail']))
            <img src="{{$book['volumeInfo']['imageLinks']['thumbnail'] ?? ''}}" alt="cover book" class="w-full h-full object-contain" >
        @else
            <p class="text-white flex items-center justify-center">Image indisponible</p>
        @endif
    </div>
    <div class="h-[160px]">
        <h3 class="font-bold text-slate-300 ">{{$book['volumeInfo']['title'] ?? 'Titre indisponible'}}</h3>
        <p class="text-white mt-2"><span class="font-semibold text-slate-500">Descripttion: </span>{{substr($book['volumeInfo']['description'] ?? 'Aucune description', 0, 30) . '...'}}</p>
        <p class="text-white mt-2"><span class="font-semibold text-slate-500">Auteur : </span>{{implode(', ', $book['volumeInfo']['authors'] ?? [])}}</p>
        <p class="text-white mt-2"><span class="font-semibold text-slate-500">Publié le : </span>{{substr($book['volumeInfo']['publishedDate'] ?? 'N/A', 0, 4)}}</p>
    </div>
    <div class="mt-6 flex justify-center items-center">
        <a href="{{route('book.store', ['id' => $book['id']])}}" class="bg-blue-700 p-3 rounded-sm w-3/4 inline-block text-center font-semibold text-white hover:bg-blue-600">Ajouter</a>
    </div>
</div>
