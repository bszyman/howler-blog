@extends("base")

@section("content")
<div class="brochurePageContent">
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
            <a href="/bookmark/{{ $bookmark->getId() }}/">Edit Bookmark &rarr;</a>
            @endauth
        </div>
    </div>

    @auth
    <h2>Edit Bookmark</h2>
    <form action="/bookmarks/update/{{ $bookmark->getId() }}/" method="post">
        @csrf
        <input type="hidden" name="bookmark_id" value="{{ $bookmark->getId() }}" />

        <div class="formSection">
            <fieldset>
                <div>
                    <label for="title">
                        Title
                    </label>
                    <input type="text" id="title" name="title" value="{{ $bookmark->getTitle() }}">
                </div>
                <div>
                    <label for="url">
                        URL
                    </label>
                    <input type="text" id="url" name="url" value="{{ $bookmark->getUrl() }}">
                </div>
                <div>
                    <label for="description">
                        Description
                    </label>
                    <textarea name="description" id="description">{{ $bookmark->getDescription() }}</textarea>
                </div>

                <div class="checkItem" style="margin-top: 7px;">
                    @if ($bookmark->getIsPublic())
                    <input type="checkbox" name="public" id="public" value="1" checked>
                    @else
                    <input type="checkbox" name="public" id="public" value="1">
                    @endif
                    <label style="display: inline;" for="public">Public/Visible</label>
                </div>
            </fieldset>

            <div class="action-bar" style="width: 100%;">
                <div class="action-bar-left">
                </div>
                <div class="action-bar-right">
                    <button type="submit" name="action" value="update">Save</button>
                </div>
            </div>
        </div>
    </form>

    <div class="formSection">
        <form action="/bookmarks/delete/{{ $bookmark->getID() }}" method="post">
            @csrf
            <div style="text-align: center;">
                <button type="submit">Delete Bookmark</button>
            </div>
        </form>
    </div>
    @endauth
</div>
@endsection
