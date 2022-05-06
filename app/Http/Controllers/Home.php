<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Repositories\PostStore;
use App\Models\Repositories\SiteStore;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function __invoke()
    {
        if (Auth::check()) {
            $posts = PostStore::paginate(true);
        } else {
            $posts = PostStore::paginate();
        }

        $site_config = SiteStore::fetchActiveConfig();

        $params = [
            "posts" => $posts,
            "site_config" => $site_config,
            "feed_nav_selected" => 1
        ];

        return view('home', $params);
    }
}
