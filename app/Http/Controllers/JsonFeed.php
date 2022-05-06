<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Repositories\PostStore;
use App\Models\Repositories\SiteStore;

class JsonFeed extends Controller
{
    public function __invoke()
    {
        $site_config = SiteStore::fetchActiveConfig();
        $posts = PostStore::mostRecent();

        return json_encode($posts);
    }
}
