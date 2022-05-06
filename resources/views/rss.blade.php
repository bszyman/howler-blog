<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title>{{ $feed_title }}</title>
        <link>{{ $site_config->getSiteUrl() }}</link>
        <description>{{ $feed_description }}</description>
        <language>en-us</language>

        @foreach ($posts as $post)
        <item>
            <title>{{ $post->getSummary() }}</title>
            <link>{{ $site_config->getSiteUrl() }}/post/{{ $post->getId() }}</link>
            <description>
                {{ $post->getPostText() }}
                @if ($post->wasEdited())
                Updated on {{ $post->getEditDate() }}.
                @endif
            </description>
            <pubDate>{{ $post->getDateCreatedAs2822() }}</pubDate>
        </item>
        @endforeach
    </channel>
</rss>
