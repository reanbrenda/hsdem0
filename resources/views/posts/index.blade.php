<x-site-layout>

    <div class="mb-4">
        {{$posts->links()}}
    </div>

    <ul class="grid grid-cols-2 gap-4">
    @foreach($posts as $post)

        <li class="block p-2 shadow-sm bg-white rounded-lg">
            <a href="{{route('posts.show', ['post' => $post])}}">

                @foreach($post->categories as $category)
                    <a href="{{route('categories.show', ['id' => $category->id])}}" class="bg-teal-500 mb-4 text-white rounded-full py-1 px-4 text-sm">
                        {{$category->name}}
                    </a>
                @endforeach

                    <a href="{{route('posts.show', ['post' => $post])}}">LINK TO POST DETAILS</a>


                    <h2 class="font-bold text-lg" >{{$post->title}}</h2>
            <div>{{$post->author?->name ?? 'UNKNOWN AUTHOR' }}</div>
            <div>{{$post->published_at}}</div>

            <div>
                {{ Str::limit($post->body, 200) }}
            </div>

            </a>
        </li>
    @endforeach
    </ul>

</x-site-layout>
