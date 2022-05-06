@extends("base")

@section("content")
<div class="microblogContainer">
    @auth
    <div>
        <form action="/posts/create" method="post">
            @csrf
            <input type="hidden" name="action" value="savePost">

            <div class="microblogPost">
                <div class="microblogPostHeader">
                    <div class="microblogPostHeaderName">
                        <span style="font-weight: bold;">
                            <label for="post_text">New Post</label>
                        </span>
                    </div>
                    <div class="microblogPostHeaderDate">
                    </div>
                </div>

                <div class="microblogPostContent">
                    <textarea rows="4" style="width: 100%;" name="post_text" id="post_text" placeholder="Create a new post."></textarea>

                    <div class="checkItem" style="margin-top: 7px;">
                        <input type="checkbox" name="published" id="published" value="1" checked>
                        <label style="display: inline;" for="published">Published</label>
                    </div>
                </div>

                <div class="action-bar" style="width: 100%;">
                    <div class="action-bar-left"></div>
                    <div class="action-bar-right">
                        <button type="submit">Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endauth

    @forelse ($posts as $post)
    <div class="microblogPost">
        <div class="microblogPostHeader">
            <div class="microblogPostHeaderName">
                <span style="font-weight: bold;">{{ $site_config->getBioName() }}</span>
            </div>
            <div class="microblogPostHeaderDate">
                <a href="/posts/{{ $post->getId() }}/">{{ $post->getPostDate() }}</a>
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
    @empty
    <p>No Posts To Show</p>
    @endforelse

    <div id="paginator" class="paginator tilesPaginator">
        {{ $posts->links() }}
    </div>
</div>
@endsection
