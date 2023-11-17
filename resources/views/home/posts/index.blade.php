<x-site-layout title="USER ZONE - MY POSTS">
    <a class="underline" href="{{route('home.posts.create')}}">Create a post</a>

    <hr/><br/>

    <x-crud-message/>

    <ul>
        @foreach($posts as $post)
            <li>
                {{$post->title}} -
                <a class="underline" href="{{route('home.posts.show', $post)}}">show</a>
                <a class="underline" href="{{route('home.posts.edit', $post)}}">edit</a>
                @if($post->published_at === null)
                    <a class="underline" href="{{route('home.posts.toggle-publish', $post)}}">publish</a>
                @else
                    <a class="underline" href="{{route('home.posts.toggle-publish', $post)}}">unpublish</a>
                @endif
            </li>
        @endforeach
    </ul>

</x-site-layout>
