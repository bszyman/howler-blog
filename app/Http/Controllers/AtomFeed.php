<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Repositories\PostStore;
use App\Models\Repositories\SiteStore;

class AtomFeed extends Controller
{
    public function __invoke()
    {
        $site_config = SiteStore::fetchActiveConfig();

        if (!$site_config->getAllowAtomSetting()) {
            abort(404);
        }

        $posts = PostStore::mostRecent();

        if ($site_config->getSiteName()) {
            $feed_title = $site_config->getSiteName();
        } else {
            $bio_name = $site_config->getBioName();
            $feed_title = "$bio_name\'s Microblog";
        }

        if ($site_config->getBio()) {
            $feed_description = $site_config->getBio();
        } else {
            $bio_name = $site_config->getBioName();
            $feed_description = "$bio_name\'s Microblog";
        }

        $params = [
            "posts" => $posts,
            "feed_title" => $feed_title,
            "feed_description" => $feed_description,
            "site_config" => $site_config
        ];

        return view('atom', $params);
    }
}
