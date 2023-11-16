<x-site-layout>

    <div class="mb-4">
        {{$posts->links()}}
    </div>

    <ul class="grid grid-cols-2 gap-4">
    @foreach($posts as $post)

        <li class="block p-2 shadow-sm bg-white hover:shadow-lg rounded-lg">

            <img src="{{$post->media->first()->getUrl('preview')}}">

            <div class="flex gap-x-2 mb-2">
                @foreach($post->categories as $category)
                    <a href="{{route('categories.show', ['id' => $category->id])}}" class="bg-teal-500 hover:bg-teal-600 text-white rounded-full py-1 px-4 text-xs">
                        {{$category->name}}
                    </a>
                @endforeach
            </div>

            <a href="{{route('posts.show', ['post' => $post])}}" class="">
                <h2 class="font-bold text-lg" >{{$post->title}}</h2>
                <span class="">{{$post->author?->name ?? 'UNKNOWN AUTHOR' }}</span>
                <span class="text-teal-500 mx-1">|</span>
                <span>{{$post->published_at->format('Y-m-d H:i')}}</span>

                <div class="px-1 pt-2">
                    {{ Str::limit($post->body, 200) }}
                </div>
            </a>
        </li>
    @endforeach
    </ul>

</x-site-layout>
