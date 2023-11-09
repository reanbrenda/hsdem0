<x-site-layout>

    <ul class="grid grid-cols-2 gap-4">
    @foreach($posts as $post)

        <li class="block p-2 shadow-sm bg-white rounded-lg">
            <a href="{{route('posts.show', ['id' => $post->id])}}">

            <h2 class="font-bold text-lg" >{{$post->title}}</h2>
            <div>{{$post->author->name}}</div>
            <div>{{$post->published_at}}</div>

            <div>
                {{$post->body}}
            </div>

            </a>
        </li>
    @endforeach
    </ul>

</x-site-layout>
