<?php

namespace App\OpenGraphServices;

use App\Models\Bookmark;
use App\Models\Friend;
use Illuminate\Support\Facades\Storage;


class OpenGraphServices
{
    public static function saveBookmarkFromOg($bookmark_url, $is_published): void
    {
        $og_info = OpenGraph::fetch($bookmark_url);
        $bookmark = new Bookmark();
        $bookmark->public = $is_published;

        if (!empty($og_info->title)) {
            $bookmark->title = $og_info->title;
        } else {
            $bookmark->title = $bookmark_url;
        }

        if (!empty($og_info->description)) {
            $bookmark->description = $og_info->description;
        } else {
            $bookmark->description = "";
        }

        if (!empty($og_info->url)) {
            $bookmark->url = $og_info->url;
        } else {
            $bookmark->url = $bookmark_url;
        }

        if (!empty($og_info->image)) {
            $extension = pathinfo($og_info->image, PATHINFO_EXTENSION);
            $file = file_get_contents($og_info->image);
            $file_name = uniqid() . ".$extension";
            $saved_location = "bookmarks/$file_name";
            $saved_successfully = Storage::disk("public")->put($saved_location, $file);

            if ($saved_successfully) {
                $bookmark->image = $saved_location;
            }
        }

        $bookmark->save();
    }

    public static function saveFriendFromOg($friend_url): void
    {
        $og_info = OpenGraph::fetch($friend_url);
        $friend = new Friend();

        if (!empty($og_info->title)) {
            $friend->title = $og_info->title;
        } else {
            $friend->title = $friend_url;
        }

        if (!empty($og_info->url)) {
            $friend->url = $og_info->url;
        } else {
            $friend->url = $friend_url;
        }

        if (!empty($og_info->image)) {
            $extension = pathinfo($og_info->image, PATHINFO_EXTENSION);
            $file = file_get_contents($og_info->image);
            $file_name = uniqid() . ".$extension";
            $saved_location = "following/$file_name";
            $saved_successfully = Storage::disk("public")->put($saved_location, $file);

            if ($saved_successfully) {
                $friend->image = $saved_location;
            }
        }

        $friend->save();
    }
}
