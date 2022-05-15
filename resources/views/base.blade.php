<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $site_config->getSiteName() }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/article.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/brochure.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/microblog.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/tiles.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/action_bar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/paginator.css') }}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    @section("opengraph")
    <meta property="og:title" content="{{ $site_config->getBioName() }}'s Microblog">
    <meta property="og:site_name" content="{{ $site_config->getSiteName() }}">
    <meta property="og:url" content="{{ $site_config->getSiteUrl() }}">
    <meta property="og:description" content="See {{ $site_config->getBioName() }}'s thoughts and travels across the internet.">
    <meta property="og:type" content="website">
    @if ($site_config->getProfilePicUrl())
    <meta property="og:image" content="{{ $site_config->getSiteUrl() }}/{{ $site_config->getProfilePicUrl() }}">
    @endif
    @show

    @if($site_config->getAllowRssSetting())
    <link href="{{ $site_config->getSiteUrl() }}/feeds/rss/" rel="alternate" type="application/rss+xml" title="RSS Feed" />
    @endif

    @if($site_config->getAllowAtomSetting())
    <link href="{{ $site_config->getSiteUrl() }}/feeds/atom/" type="application/atom+xml" rel="alternate" title="Atom Feed" />
    @endif
</head>
<body>
<div class="contentContainer">
    <div class="navigationSideBar">
        <div class="navigationTitleGroup">
            @if ($site_config->getProfilePicUrl())
            <img src="{{ asset('storage/'. $site_config->getProfilePicUrl()) }}" alt="profile picture" width="250" height="250">
            @endif
            <p class="navigationTitleGroupSiteTitle">{{ $site_config->getBioName() }}</p>
            <p class="navigationTitleGroupDescription">
                {{ $site_config->getBio() }}
            </p>
            <p class="navigationTitleGroupDescription navigationBioLocation">{{ $site_config->getLocation() }}</p>
        </div>

        <div class="navigationGroup">
            <p class="navigationGroupTitle">Navigation</p>
            <ul>
                @auth
                <li><a href="/" class="{{ $feed_nav_selected ?? '' }}">Feed</a></li>
                @else
                    @if($site_config->getIncludeFeedSetting())
                        <li><a href="/" class="{{ $feed_nav_selected ?? '' }}">Feed</a></li>
                    @endif
                @endauth

                @auth
                <li><a href="/bookmarks/" class="{{ $bookmarks_nav_selected ?? '' }}">Bookmarks</a></li>
                @else
                    @if($site_config->getIncludeBookmarksSetting())
                    <li><a href="/bookmarks/" class="{{ $bookmarks_nav_selected ?? '' }}">Bookmarks</a></li>
                    @endif
                @endauth

                @auth
                <li><a href="/following/" class="{{ $following_nav_selected ?? '' }}">Following</a></li>
                @else
                    @if($site_config->getIncludeFollowingSetting())
                    <li><a href="/following/" class="{{ $following_nav_selected ?? '' }}">Following</a></li>
                    @endif
                @endauth

                @auth
                <li><a href="/settings/" class="{{ $settings_nav_selected ?? '' }}">Settings</a></li>
                <li><a href="/logout/">Logout</a></li>
                @else
                <li><a href="/login/">Login</a></li>
                @endauth
            </ul>
        </div>

        <div class="navigationGroup">
            <p class="navigationGroupTitle">Socials</p>
            <ul>
                @if ($site_config->getSocialFlickrUrl())
                <li><a href="{{ $site_config->getSocialFlickrUrl() }}" target="_blank" rel="noopener">Flickr</a></li>
                @endif

                @if($site_config->getSocialInstagramUrl())
                <li><a href="{{ $site_config->getSocialInstagramUrl() }}" target="_blank" rel="noopener">Instagram</a></li>
                @endif

                @if($site_config->getSocialSoundCloudUrl())
                <li><a href="{{ $site_config->getSocialSoundCloudUrl() }}" target="_blank" rel="noopener">SoundCloud</a></li>
                @endif

                @if($site_config->getSocialUnsplashUrl())
                <li><a href="{{ $site_config->getSocialUnsplashUrl() }}" target="_blank" rel="noopener">Unsplash</a></li>
                @endif

                @if($site_config->getSocialVimeoUrl())
                <li><a href="{{ $site_config->getSocialVimeoUrl() }}" target="_blank" rel="noopener">Vimeo</a></li>
                @endif

                @if($site_config->getSocialWebsiteUrl())
                <li><a href="{{ $site_config->getSocialWebsiteUrl() }}" target="_blank" rel="noopener">Website</a></li>
                @endif

                @if($site_config->getSocialYouTubeUrl())
                <li><a href="{{ $site_config->getSocialYouTubeUrl() }}" target="_blank" rel="noopener">YouTube</a></li>
                @endif
            </ul>
        </div>

        <div class="navigationGroup">
            <ul>
                <li><a href="https://howlerblog.com" target="_blank" rel="noopener">This blog by Howler</a></li>
            </ul>
        </div>
    </div>

    <div class="contentSection">
        @yield("content")
    </div>
</div>

</body>
</html>
