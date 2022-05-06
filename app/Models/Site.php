<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Site extends Model implements SiteInterface
{
    use Uuids;

    const ATTR_SITE_URL = "site_url";
    const ATTR_SITE_NAME = "site_name";
    const ATTR_PROFILE_PIC = "profile_pic";
    const ATTR_BIO_NAME = "bio_name";
    const ATTR_BIO = "bio";
    const ATTR_LOCATION = "location";
    const ATTR_INCLUDE_FEED = "include_feed";
    const ATTR_INCLUDE_BOOKMARKS = "include_bookmarks";
    const ATTR_INCLUDE_FOLLOWING = "include_following";
    const ATTR_ALLOW_RSS_FEED = "allow_rss_feed";
    const ATTR_ALLOW_ATOM_FEED = "allow_atom_feed";
    const ATTR_SOCIAL_FLICKR = "social_flickr";
    const ATTR_SOCIAL_INSTAGRAM = "social_instagram";
    const ATTR_SOCIAL_SOUNDCLOUD = "social_soundcloud";
    const ATTR_SOCIAL_UNSPLASH = "social_unsplash";
    const ATTR_SOCIAL_VIMEO = "social_vimeo";
    const ATTR_SOCIAL_WEBSITE = "social_website";
    const ATTR_SOCIAL_YOUTUBE = "social_youtube";
    const ATTR_SOCIAL_BITBUCKET = "social_bitbucket";
    const ATTR_SOCIAL_GITHUB = "social_github";

    protected $fillable = [
        self::ATTR_SITE_URL,
        self::ATTR_SITE_NAME,
        self::ATTR_PROFILE_PIC,
        self::ATTR_BIO_NAME,
        self::ATTR_BIO,
        self::ATTR_LOCATION,
        self::ATTR_INCLUDE_FEED,
        self::ATTR_INCLUDE_BOOKMARKS,
        self::ATTR_INCLUDE_FOLLOWING,
        self::ATTR_ALLOW_RSS_FEED,
        self::ATTR_ALLOW_ATOM_FEED,
        self::ATTR_SOCIAL_FLICKR,
        self::ATTR_SOCIAL_INSTAGRAM,
        self::ATTR_SOCIAL_SOUNDCLOUD,
        self::ATTR_SOCIAL_UNSPLASH,
        self::ATTR_SOCIAL_VIMEO,
        self::ATTR_SOCIAL_WEBSITE,
        self::ATTR_SOCIAL_YOUTUBE,
        self::ATTR_SOCIAL_BITBUCKET,
        self::ATTR_SOCIAL_GITHUB
    ];

    public function getId()
    {
        return $this->getKey();
    }

    public function getSiteUrl()
    {
        return $this->{self::ATTR_SITE_URL};
    }

    public function getSiteName()
    {
        return $this->{self::ATTR_SITE_NAME};
    }

    public function getProfilePicUrl()
    {
        return $this->{self::ATTR_PROFILE_PIC};
    }

    public function getBioName()
    {
        return $this->{self::ATTR_BIO_NAME};
    }

    public function getBio()
    {
        return $this->{self::ATTR_BIO};
    }

    public function getLocation()
    {
        return $this->{self::ATTR_LOCATION};
    }

    public function getIncludeFeedSetting()
    {
        return $this->{self::ATTR_INCLUDE_FEED};
    }

    public function getIncludeBookmarksSetting()
    {
        return $this->{self::ATTR_INCLUDE_BOOKMARKS};
    }

    public function getIncludeFollowingSetting()
    {
        return $this->{self::ATTR_INCLUDE_FOLLOWING};
    }

    public function getAllowRssSetting()
    {
        return $this->{self::ATTR_ALLOW_RSS_FEED};
    }

    public function getAllowAtomSetting()
    {
        return $this->{self::ATTR_ALLOW_ATOM_FEED};
    }

    public function getSocialFlickrUrl()
    {
        return $this->{self::ATTR_SOCIAL_FLICKR};
    }

    public function getSocialInstagramUrl()
    {
        return $this->{self::ATTR_SOCIAL_INSTAGRAM};
    }

    public function getSocialSoundCloudUrl()
    {
        return $this->{self::ATTR_SOCIAL_SOUNDCLOUD};
    }

    public function getSocialUnsplashUrl()
    {
        return $this->{self::ATTR_SOCIAL_UNSPLASH};
    }

    public function getSocialVimeoUrl()
    {
        return $this->{self::ATTR_SOCIAL_VIMEO};
    }

    public function getSocialWebsiteUrl()
    {
        return $this->{self::ATTR_SOCIAL_WEBSITE};
    }

    public function getSocialYouTubeUrl()
    {
        return $this->{self::ATTR_SOCIAL_YOUTUBE};
    }

    public function getSocialBitBucketUrl()
    {
        return $this->{self::ATTR_SOCIAL_BITBUCKET};
    }

    public function getSocialGitHubUrl()
    {
        return $this->{self::ATTR_SOCIAL_GITHUB};
    }

}
