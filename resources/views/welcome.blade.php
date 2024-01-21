<x-site-layout title="Welcome">

    {{ __('Hello, how are you doing') }}

    <div class="flex gap-6">
        <div class="w-2/3">
            <h2 class="font-bold">Latest News</h2>
            <div class="max-h-40 overflow-y-auto">
                <ul class="grid grid-cols-1 gap-8">
                    @foreach($recent_news as $post)
                        <li class="block shadow-sm bg-white hover:shadow-lg rounded-lg grid grid-cols-3 group overflow-hidden">
                            <!-- ... existing code ... -->
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="w-1/3 border border-teal-500 rounded-sm p-4">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-1/3 border border-teal-500 rounded-sm p-4">
            <h2 class="font-bold">Top Authors</h2>
            <div class="grid gap-4">
                @foreach($authors as $author)
                    <div>
                        {{ $author->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-site-layout>



