<x-site-layout title="Welcome" >

    {{__('Hello, how are you doing') }}

    <div class="flex gap-6">
        <div class="w-2/3">
            <h2 class="font-bold">Latest News</h2>
            <ul class="grid grid-cols-1 gap-8">
                @foreach($recent_news as $post)

                    <li class="block shadow-sm bg-white hover:shadow-lg rounded-lg grid grid-cols-3 group overflow-hidden">

                        <a href="{{route('posts.show', ['post' => $post])}}" class="block h-full bg-red-50 rounded-l overflow-hidden">
                            <img src="{{$post->getImageUrl('preview')}}" class="rounded-l h-full group-hover:scale-110 transition duration-500 cursor-pointer object-cover">
                        </a>

                        <div class="col-span-2 p-2">
                            <div class="flex gap-x-2 mb-2">
                                @foreach($post->categories as $category)
                                    <a href="{{route('categories.show', ['id' => $category->id])}}" class="uppercase bg-teal-500 hover:bg-teal-600 text-white rounded-full py-1 px-4 text-xs">
                                        {{$category->name}}
                                    </a>
                                @endforeach
                            </div>

                            <a href="{{route('posts.show', ['post' => $post])}}" class="">
                                <h2 class="font-bold text-lg line-clamp-1" >{{$post->title}}</h2>
                                <span class="">{{$post->author?->name ?? 'UNKNOWN AUTHOR' }}</span>
                                <span class="text-teal-500 mx-1">|</span>
                                <span>{{$post->published_at->format('Y-m-d H:i')}}</span>

                                <div class="px-1 pt-2 line-clamp-3">
                                    {{ Str::limit( strip_tags($post->body), 200) }}
                                </div>
                            </a>


                        </div>

                    </li>
                @endforeach
            </ul>
        </div>


        <div class="w-1/3 border border-teal-500 rounded-sm p-4">
        <div>

            <form method="get" action="{{ route('welcome') }}" class="mb-4">
                @csrf
                <label for="category">Select Category:</label>
                <select name="category" id="category">
                    <option value="business" {{ request('category') == 'business' ? 'selected' : '' }}>Business</option>
                    <option value="entertainment" {{ request('category') == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
                    <option value="general" {{ request('category') == 'general' ? 'selected' : '' }}>General</option>
                    <option value="health" {{ request('category') == 'health' ? 'selected' : '' }}>Health</option>
                    <option value="science" {{ request('category') == 'science' ? 'selected' : '' }}>Science</option>
                    <option value="sports" {{ request('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                    <option value="technology" {{ request('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                </select>
                <button type="submit">Submit</button>
            </form>

    </div>
            <h2 class="font-bold">Headline News</h2>
            <div class="max-h-40 overflow-y-auto grid gap-4">
                @foreach($newsdata as $news)
                    <div class="card mt-5 ml-5" style="width:90%">
                        <div class="row center">
                            <div class="col-sm-6">
                                <h5 class="card-title">{{ $news['title'] }}</h5>
                                <img src="{{ $news['urlToImage'] }}" class="card-img-top" alt="..."
                                    style="width:90%;height:90%">
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <p class="card-text">{{ $news['content'] }}</p>
                                    <p class="card-text"><small class="text-muted"> Publish Date:
                                            {{ date('d-m-Y', strtotime($news['publishedAt'])) }}</small></p>
                                    <p class="card-text"><small class="text-muted"> Author: {{ $news['author'] }}
                                        </small></p>
                                </div>
                            </a>


                            </div>
                        </div>

                    </li>
                    </div>
                @endforeach
            </ul>
            </div>
        </div>
    </div>




</x-site-layout>



