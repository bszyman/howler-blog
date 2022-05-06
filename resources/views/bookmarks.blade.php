@extends("base")

@section("content")
@auth
<div>
    <form action="/bookmarks/save" method="post">
        @csrf
        <input type="hidden" name="action" value="saveBookmark">

        <div class="microblogPost formSection">
            <div class="microblogPostHeader">
                <div class="microblogPostHeaderName">
                        <span style="font-weight: bold;">
                            <label>Add Bookmark</label>
                        </span>
                </div>
                <div class="microblogPostHeaderDate">
                </div>
            </div>

            <div class="microblogPostContent">
                <div>
                    <label for="url">Url</label>
                    <input type="url" id="url" name="url">
                </div>

                <div class="checkItem" style="margin-top: 7px;">
                    <input type="checkbox" name="public" id="public" value="1" checked>
                    <label style="display: inline;" for="public">Published</label>
                </div>
            </div>

            <div class="action-bar" style="width: 100%;">
                <div class="action-bar-left"></div>
                <div class="action-bar-right">
                    <button type="submit">Add</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endauth

<div class="brochurePageContent">
    @forelse ($bookmarks as $bookmark)
    <div class="brochurePageSplitLeft">
        <div>
            @if($bookmark->getImage())
            @php
            $image_asset_location = asset('storage/'. $bookmark->getImage());
            @endphp
            <div class="brochureSplitImage" style="background-image: url('{{ $image_asset_location }}');"></div>
            @else
            <div class="brochureSplitImage"></div>
            @endif
        </div>
        <div>
            <a href="{{ $bookmark->getUrl() }}" target="_blank" rel="noopener">
                <h2>{{ $bookmark->getTitle() }}</h2>
            </a>
            <p>{{ $bookmark->getDescription() }}</p>
            @auth
            <a href="/bookmarks/{{ $bookmark->getId() }}/">Edit Bookmark &rarr;</a>
            @endauth
        </div>
    </div>
    @empty
    <p>No Bookmarks To Show</p>
    @endforelse

    <div id="paginator" class="paginator microblogPaginator">
        {{ $bookmarks->links() }}
    </div>
</div>
@endsection
