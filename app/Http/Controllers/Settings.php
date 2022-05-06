<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Repositories\SiteStore;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Settings extends Controller
{
    public function viewSettings()
    {
        $site_config = SiteStore::fetchActiveConfig();
        $user = Auth::user();

        $params = [
            "site_config" => $site_config,
            "user" => $user
        ];

        return view("settings", $params);
    }

    public function saveSettings(Request $request)
    {
        $site = SiteStore::fetchActiveConfig();
        $user = Auth::user();

        $site->site_name = $request->input("siteName");
        $site->site_url = $request->input("siteUrl");
        $site->bio_name = $request->input("bioName");
        $site->bio = $request->input("bio");
        $site->location = $request->input("location");
        $site->include_feed = $request->boolean("useMicroblog");
        $site->include_bookmarks = $request->boolean("useBookmarks");
        $site->allow_rss_feed = $request->boolean("allowRSSFeeds");
        $site->allow_atom_feed = $request->boolean("allowAtomFeeds");
        $site->include_following = $request->boolean("useFollowing");
        $site->social_flickr = $request->input("flickr");
        $site->social_instagram = $request->input("instagram");
        $site->social_soundcloud = $request->input("soundcloud");
        $site->social_unsplash = $request->input("unsplash");
        $site->social_vimeo = $request->input("vimeo");
        $site->social_website = $request->input("website");
        $site->social_youtube = $request->input("youtube");
        $site->social_bitbucket = $request->input("bitbucket");
        $site->social_github = $request->input("github");

        if ($request->hasFile("profilePic")) {
            if ($request->file("profilePic")->isValid()) {
                $profile_pic_path = $request->profilePic->store("public/profile_pics");

                $site->profile_pic = $profile_pic_path;
            }
        }

        $site->save();

        $user->name = $request->input("fullName");
        $user->email = $request->input("emailAddress");

        $user->save();

        return redirect("/settings");
    }
}
