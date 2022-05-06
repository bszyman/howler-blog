@extends("base")

@section("content")
<div class="microblogContainer">
    @guest
    <div class="microblogPost">
        <div class="microblogPostHeader">
            <div class="microblogPostHeaderName">
                <span style="font-weight: bold;">{{ $site_config->getBioName() }}</span>
            </div>
            <div class="microblogPostHeaderDate">
                <a href="/posts/{{ $post->getID() }}">{{ $post->getPostDate() }}</a>
            </div>
        </div>

        <div class="microblogPostContent">
            <p>{{ $post->getPostText() }}</p>
        </div>

        @if ($post->wasEdited())
        <div class="microblogPostEditedDate">
            Edited {{ $post->getEditDate() }}
        </div>
        @endif
    </div>
    @endguest

    @auth
    <div class="microblogPost">
        <form action="/posts/update/{{ $post->getID() }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->getID() }}" />

            <div class="microblogPostHeader">
                <div class="microblogPostHeaderName">
                        <span style="font-weight: bold;">
                            <label for="post_text">{{ $site_config->getBioName() }}</label>
                        </span>
                </div>
                <div class="microblogPostHeaderDate">
                    <a href="/posts/{{ $post->getID() }}">{{ $post->getPostDate() }}</a>
                </div>
            </div>

            <div class="microblogPostContent">
                <textarea rows="4" style="width: 100%;" name="post_text" id="post_text">{{ $post->getPostText() }}</textarea>

                <div class="checkItem" style="margin-top: 7px;">
                    @if($post->getPublished())
                    <input type="checkbox" name="published" id="published" value="1" checked>
                    @else
                    <input type="checkbox" name="published" id="published" value="1">
                    @endif
                    <label style="display: inline;" for="published">Published</label>
                </div>
            </div>

            <div class="action-bar" style="width: 100%;">
                <div class="action-bar-left">
                    @if ($post->wasEdited())
                    Edited: {{ $post->getEditDate() }}
                    @endif
                </div>
                <div class="action-bar-right">
                    <button type="submit" name="action" value="update">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div class="microblogPost">
        <form action="/posts/delete/{{ $post->getID() }}" method="post">
            @csrf
            <div style="text-align: center;">
                <button type="submit">Delete Post</button>
            </div>
        </form>
    </div>
    @endauth
</div>
@endsection
