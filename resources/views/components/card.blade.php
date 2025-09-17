@props(['image', 'title', 'description', 'author', 'published', 'action'])
<div class="bg-slate-800 p-2 h-[450px] rounded-md">
    <div class="flex item-center justify-center h-44 bg-black p-1 m-2 rounded-md">
        @if ($image)
            <img src="{{$image}}" alt="cover book" class="w-full h-full object-contain" >
        @else
            <p class="text-white flex items-center justify-center">Image indisponible</p>
        @endif
    </div>
    <div class="h-[160px]">
        <h3 class="font-bold text-slate-300 ">{{$title}}</h3>
        <p class="text-white mt-2"><span class="font-semibold text-slate-500">Descripttion: </span>{{$description}}</p>
        <p class="text-white mt-2"><span class="font-semibold text-slate-500">Auteur : </span>{{$author}}</p>
        <p class="text-white mt-2"><span class="font-semibold text-slate-500">Publié le : </span>{{$published}}</p>
    </div>
    <div class="mt-6 flex justify-center items-center">
        <x-form-button :action="$action">
            Ajouter
        </x-form-button>
    </div>
</div>
