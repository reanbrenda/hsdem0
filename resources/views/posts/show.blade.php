


<x-site-layout title="{{$post->title}}">

    <a href="{{route('categories.show', ['id' => $post->category->id])}}" class="bg-teal-500 mb-4 text-white rounded-full py-1 px-4 text-sm">
        {{$post->category->name}}
    </a>

    <div class="mb-2 font-semibold">
        written by: <a class="underline" href="{{route('users.show', ['id' => $post->author->id])}}">{{$post->author->name}}</a>
    </div>
    {{$post->published_at}}
    {{$post->body}}
</x-site-layout>
