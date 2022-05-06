<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Repositories\BookmarkStore;
use App\Models\Repositories\SiteStore;
use App\OpenGraphServices\OpenGraphServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Bookmarks extends Controller
{
    public function browse()
    {
        if (Auth::check()) {
            $bookmarks =  BookmarkStore::paginate(true);
        } else {
            $bookmarks = BookmarkStore::paginate();
        }

        $site_config = SiteStore::fetchActiveConfig();

        $params = [
            "bookmarks" => $bookmarks,
            "site_config" => $site_config,
            "feed_bookmarks_selected" => 1
        ];

        return view('bookmarks', $params);
    }

    public function detailView($id)
    {
        $site_config = SiteStore::fetchActiveConfig();
        $bookmark = BookmarkStore::fetchWithId($id);

        if (!Auth::check()) {
            if (!$bookmark->getIsPublic()) {
                abort(404);
            }
        }

        $params = [
            "bookmark" => $bookmark,
            "site_config" => $site_config,
            "feed_nav_selected" => 1
        ];

        return view('bookmark', $params);
    }

    public function saveBookmark(Request $request)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $bookmark_url = $request->input("url");
        $is_published = $request->boolean("public");
        OpenGraphServices::saveBookmarkFromOg($bookmark_url, $is_published);

        return redirect("/bookmarks");
    }

    public function updateBookmark(Request $request, $id)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $bookmark = BookmarkStore::fetchWithId($id);
        $bookmark->title = $request->input("title");
        $bookmark->url = $request->input("url");
        $bookmark->description = $request->input("description");
        $bookmark->public = $request->boolean("public");
        $bookmark->save();

        return redirect("/bookmarks/" . $bookmark->getId());
    }

    public function deleteBookmark($id)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $bookmark = BookmarkStore::fetchWithId($id);
        $bookmark->delete();

        return redirect("/bookmarks");
    }
}
