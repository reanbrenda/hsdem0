<div class="w-3/3 border border-teal-500 rounded-sm p-4 overflow-hidden">
    <div>
        <form method="get" action="{{ route('welcome') }}" class="mb-4">

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
    <div class="grid gap-4">
        @forelse(collect($newsdata)->take(3) as $news)
            <div class="card mt-5" style="width:90%">
                <div class="row center">
                    <div class="col-sm-4">
                        <img src="{{ $news['urlToImage'] }}" class="card-img-top" alt="..." style="width:100%; height:auto;">
                    </div>
                    <div class="col-sm-8">
                        <a href="{{ $news['url'] }}" class="text-xl font-bold text-blue-500 hover:underline">
                            {{ $news['title'] }}
                        </a>
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
