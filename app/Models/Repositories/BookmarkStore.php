<?php

namespace App\Models\Repositories;

use App\Models\Bookmark;

class BookmarkStore
{
    public static function fetchWithId(string $id): Bookmark
    {
        return Bookmark::find($id);
    }

    public static function persist(Bookmark $bookmark): void
    {

    }

    public static function deleteWithId(Bookmark $bookmark): void
    {
        $bookmark->delete();
    }

    public static function paginate(bool $include_private = false)
    {
        if ($include_private) {
            return Bookmark::orderBy("created_at", "desc")->paginate(20);
        } else {
            return Bookmark::where("public", 1)->orderBy("created_at", "desc")->paginate(20);
        }
    }
}
