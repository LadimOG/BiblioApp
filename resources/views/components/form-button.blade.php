@props(['action'])
<form action="{{$action}}" method="post" class="w-full flex justify-center items-center">
    @csrf
    <button type="submit" class="bg-blue-700 p-3 inline-block w-3/4 rounded-sm  text-center font-semibold text-white hover:bg-blue-600">{{$slot}}</button>
</form>