<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>{{ $feed_title }}</title>
    <subtitle>{{ $feed_description }}</subtitle>
    <link href="{{ $site_config->getSiteUrl() }}/feeds/atom" rel="self" />

    @foreach ($posts as $post)
    <entry>
        <title>{{ $post->getSummary() }}</title>
        <link href="{{ $site_config->getSiteUrl() }}/post/{{ $post->getId() }}" />
        <id>{{ $post->getId() }}</id>
        <published>{{ $post->getDateCreatedAsIso() }}</published>
        <updated>{{ $post->getDateUpdatedAsIso() }}</updated>
        <summary>{{ $post->getSummary() }}</summary>
        <content type="xhtml">{{ $post->getPostText() }}</content>
        <author>
            <name>{{ $site_config->getBioName() }}</name>
        </author>
    </entry>
    @endforeach
</feed>
