


<x-site-layout title="{{$category->name}}">

    All the posts with this category

    <ul class="list-disc ml-4">
        @foreach($category->posts as $post)
            <li>
                <a class="underline" href="{{route('posts.show', ['id' => $post->id])}}">
                    {{$post->title}}
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>
