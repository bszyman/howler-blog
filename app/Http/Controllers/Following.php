<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Repositories\FriendStore;
use App\Models\Repositories\SiteStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\OpenGraphServices\OpenGraphServices;

class Following extends Controller
{
    public function browse()
    {
        $site_config = SiteStore::fetchActiveConfig();

        if (!Auth::check()) {
            if (!$site_config->getIncludeFollowingSetting()) {
                abort(401);
            }
        }

        $following = FriendStore::paginate();

        $params = [
            "site_config" => $site_config,
            "following" => $following
        ];

        return view("following", $params);
    }

    public function startFollowing(Request $request)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $friend_url = $request->input("url");
        OpenGraphServices::saveFriendFromOg($friend_url);

        return redirect("/following");
    }

    public function stopFollowing(Request $request, $id)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $friend = FriendStore::fetchWithId($id);
        $friend->delete();

        return redirect("/following");
    }
}
