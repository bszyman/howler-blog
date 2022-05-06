@extends("base")

@section("content")
<form action="/settings/update" method="post" enctype="multipart/form-data">
    @csrf
    <h2>Site Information</h2>
    <div class="formSection">
        <fieldset>
            <div>
                <label for="siteName">
                    Site Name
                </label>
                <input type="text" id="siteName" name="siteName" value="{{ $site_config->getSiteName() }}">
            </div>
            <div>
                <label for="siteUrl">
                    Site Url
                </label>
                <input type="text" id="siteUrl" name="siteUrl" value="{{ $site_config->getSiteUrl() }}">
            </div>
        </fieldset>
    </div>

    <h2>About You</h2>
    <div class="formSection">
        <fieldset>
            <div>
                <label for="profilePic">
                    Profile Image
                </label>
                <input type="file" id="profilePic" name="profilePic" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div>
                <label for="bioName">
                    Bio Name
                </label>
                <input type="text" id="bioName" name="bioName" value="{{ $site_config->getBioName() }}">
            </div>
            <div>
                <label for="bio">
                    Bio
                </label>
                <textarea name="bio" id="bio">{{ $site_config->getBio() }}</textarea>
            </div>
            <div>
                <label for="location">
                    Location
                </label>
                <input type="text" id="location" name="location" placeholder="optional" value="{{ $site_config->getLocation() }}">
            </div>
        </fieldset>
    </div>

    <h2>Your Account</h2>
    <div class="formSection">
        <fieldset>
            <div>
                <label for="fullName">
                    Full Name
                </label>
                <input type="text" id="fullName" name="fullName" value="{{ $user->name }}">
            </div>
            <div>
                <label for="emailAddress">
                    Email Address
                </label>
                <input type="email" id="emailAddress" name="emailAddress" class="formFieldStandardBottomMargin" value="{{ $user->email }}">
                <p class="formSectionFieldText formField10pxBottomMargin">Your email address will be used as your login username.</p>
            </div>
        </fieldset>
    </div>

    <h2>Features</h2>
    <div class="formSection">
        <fieldset>
            <div class="checkItem">
                @if($site_config->getIncludeFeedSetting())
                <input type="checkbox" name="useMicroblog" id="useMicroblog" value="1" checked>
                @else
                <input type="checkbox" name="useMicroblog" id="useMicroblog" value="1">
                @endif
                <label style="display: inline;" for="useMicroblog">Enable Microblog</label>
            </div>
            <div class="checkItem" style="margin-left: 30px;">
                @if($site_config->getAllowRssSetting())
                <input type="checkbox" name="allowRSSFeeds" id="allowRSSFeeds" value="1" checked>
                @else
                <input type="checkbox" name="allowRSSFeeds" id="allowRSSFeeds" value="1">
                @endif
                <label style="display: inline;" for="allowRSSFeeds">Enable RSS Feed</label>
            </div>
            <div class="checkItem" style="margin-left: 30px;">
                @if($site_config->getAllowAtomSetting())
                <input type="checkbox" name="allowAtomFeeds" id="allowAtomFeeds" value="1" checked>
                @else
                <input type="checkbox" name="allowAtomFeeds" id="allowAtomFeeds" value="1">
                @endif
                <label style="display: inline;" for="allowAtomFeeds">Enable Atom Feed</label>
            </div>
            <div class="checkItem">
                @if($site_config->getIncludeBookmarksSetting())
                <input type="checkbox" name="useBookmarks" id="useBookmarks" value="1" checked>
                @else
                <input type="checkbox" name="useBookmarks" id="useBookmarks" value="1">
                @endif
                <label style="display: inline;" for="useBookmarks">Show My Bookmarks</label>
            </div>
            <div class="checkItem">
                @if($site_config->getIncludeFollowingSetting())
                <input type="checkbox" name="useFollowing" id="useFollowing" value="1" checked>
                @else
                <input type="checkbox" name="useFollowing" id="useFollowing" value="1">
                @endif
                <label style="display: inline;" for="useFollowing">Show Who I'm Following</label>
            </div>
        </fieldset>
    </div>

    <h2>Socials</h2>
    <div class="formSection">
        <fieldset>
            <div>
                <label for="bitbucket">Bitbucket</label>
                <input type="url" id="bitbucket" name="bitbucket" value="{{ $site_config->getSocialBitBucketUrl() }}">
            </div>
            <div>
                <label for="flickr">Flickr</label>
                <input type="url" id="flickr" name="flickr" value="{{ $site_config->getSocialFlickrUrl() }}">
            </div>
            <div>
                <label for="github">GitHub</label>
                <input type="url" id="github" name="github" value="{{ $site_config->getSocialGitHubUrl() }}">
            </div>
            <div>
                <label for="instagram">Instagram</label>
                <input type="url" id="instagram" name="instagram" value="{{ $site_config->getSocialInstagramUrl() }}">
            </div>
            <div>
                <label for="soundcloud">SoundCloud</label>
                <input type="url" id="soundcloud" name="soundcloud" value="{{ $site_config->getSocialSoundCloudUrl() }}">
            </div>
            <div>
                <label for="unsplash">Unsplash</label>
                <input type="url" id="unsplash" name="unsplash" value="{{ $site_config->getSocialUnsplashUrl() }}">
            </div>
            <div>
                <label for="vimeo">Vimeo</label>
                <input type="url" id="vimeo" name="vimeo" value="{{ $site_config->getSocialVimeoUrl() }}">
            </div>
            <div>
                <label for="website">Website</label>
                <input type="url" id="website" name="website" value="{{ $site_config->getSocialWebsiteUrl() }}">
            </div>
            <div>
                <label for="youtube">YouTube</label>
                <input type="url" id="youtube" name="youtube" value="{{ $site_config->getSocialYouTubeUrl() }}">
            </div>
        </fieldset>
    </div>

    <div class="action-bar" style="width: 100%;">
        <div class="action-bar-left"></div>
        <div class="action-bar-right">
            <button type="submit" name="action" value="update">Save Changes</button>
        </div>
    </div>
</form>
@endsection
