@extends("base")

@section("content")
@auth
<div>
    <form action="/following/start-following" method="post">
        @csrf
        <div class="microblogPost formSection">
            <div class="microblogPostHeader">
                <div class="microblogPostHeaderName">
                        <span style="font-weight: bold;">
                            <label for="post_text">Add Friend</label>
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

<div class="tileContainer">
    @forelse($following as $friend)
    <div class="tile">
        @if ($friend->getImageUrl())
        <a href="{{ $friend->getUrl() }}">
            <img src="{{ $friend->getImageUrl() }}" width="250" height="250">
        </a>
        @else
        <a href="{{ $friend->getUrl() }}">
            <div class="emptyTile"></div>
        </a>
        @endif

        <div class="tileTitle">
            <a href="{{ $friend->getUrl() }}" rel="nofollow">{{ $friend->getName() }}</a>
        </div>

        @auth
        <div>
            <form action="/following/stop-following/{{ $friend->getId() }}" method="post">
                @csrf
                <input type="hidden" name="friend_id" value="{{ $friend->getId() }}" />
                <button type="submit" name="action" value="remove">Remove</button>
            </form>
        </div>
        @endauth
    </div>
    @empty
    <p>Not following anyone.</p>
    @endforelse
</div>

<div id="paginator" class="paginator tilesPaginator">
    {{ $following->links() }}
</div>
@endsection
