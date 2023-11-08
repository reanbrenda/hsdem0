<x-site-layout title="Categories">

    <ul class="grid grid-cols-4 gap-4">
    @foreach($categories as $category)
        <li class="block p-2 bg-white">{{$category->name}}</li>
    @endforeach
    </ul>

</x-site-layout>
