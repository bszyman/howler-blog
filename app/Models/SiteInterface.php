<?php

namespace App\Models;
interface SiteInterface
{
    public function getId();

    public function getSiteUrl();

    public function getSiteName();

    public function getProfilePicUrl();

    public function getBioName();

    public function getBio();

    public function getLocation();

    public function getIncludeFeedSetting();

    public function getIncludeBookmarksSetting();

    public function getIncludeFollowingSetting();

    public function getAllowRssSetting();

    public function getAllowAtomSetting();

    public function getSocialFlickrUrl();

    public function getSocialInstagramUrl();

    public function getSocialSoundCloudUrl();

    public function getSocialUnsplashUrl();

    public function getSocialVimeoUrl();

    public function getSocialWebsiteUrl();

    public function getSocialYouTubeUrl();

    public function getSocialBitBucketUrl();

    public function getSocialGitHubUrl();
}
