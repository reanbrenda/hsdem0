<x-site-layout>

    <ul class="grid grid-cols-2 gap-4">
    @foreach($posts as $post)

        <li class="block p-2 shadow-sm bg-white rounded-lg">
            <a href="{{route('posts.show', ['id' => $post->id])}}">

                @foreach($post->categories as $category)
                    <a href="{{route('categories.show', ['id' => $category->id])}}" class="bg-teal-500 mb-4 text-white rounded-full py-1 px-4 text-sm">
                        {{$category->name}}
                    </a>
                @endforeach


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
