<?php

namespace App\Models\Repositories;

use App\Models\Friend;

class FriendStore
{
    public static function fetchWithId(string $id): Friend
    {
        return Friend::find($id);
    }

    public static function persist(Friend $friend): void
    {

    }

    public static function deleteWithId(Friend $friend): void
    {
        $friend->delete();
    }

    public static function paginate()
    {
        return Friend::orderBy("name")->paginate(20);
    }
}
