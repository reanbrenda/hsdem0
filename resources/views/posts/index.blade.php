<x-site-layout>

    <ul class="grid grid-cols-2 gap-4">
    @foreach($posts as $post)
        <li class="block p-2 shadow-sm bg-white rounded-lg">

            <h2 class="font-bold text-lg" >{{$post->title}}</h2>
            <span>{{$post->published_at}}</span>

            <div>
                {{$post->body}}
            </div>


        </li>
    @endforeach
    </ul>

</x-site-layout>
