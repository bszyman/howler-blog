<?php

namespace App\Http\Controllers;

use App\Models\Repositories\SiteStore;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\User;

class Initialization extends Controller
{
    public function presentInitForm()
    {
        if (SiteStore::checkIfInitialized()) {
            return redirect("/");
        }

        return view('initialize', []);
    }

    public function saveInitForm(Request $request)
    {
        if (SiteStore::checkIfInitialized()) {
            abort(401);
        }

        $site_config = Site::create([
            "site_name" => $request->input("siteName"),
            "bio_name" => $request->input("bioName"),
            "bio" => $request->input("bio"),
            "location" => $request->input("location"),
            "include_feed" => $request->boolean("useMicroblog"),
            "include_bookmarks" => $request->boolean("useBookmarks"),
            "allow_rss_feed" => $request->boolean("allowRSSFeeds"),
            "allow_atom_feed" => $request->boolean("allowAtomFeeds"),
            "include_following" => $request->boolean("useFollowing")
        ]);

        $site_config->save();

        $user = User::create([
            "name" => $request->input("fullName"),
            "email" => $request->input("emailAddress"),
            "email_verified_at" => now(),
            "password" => password_hash($request->input("password"), PASSWORD_DEFAULT)
        ]);

        $user->save();

        return redirect("/");
    }
}
