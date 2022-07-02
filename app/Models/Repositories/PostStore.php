<?php

namespace App\Models\Repositories;

use App\Models\Post;

class PostStore
{
    public static function fetchWithId(string $id): Post
    {
        return Post::find($id);
    }

    public static function persist(Post $post): void
    {

    }

    public static function deleteWithId(Post $post): void
    {
        $post->delete();
    }

    public static function paginate(bool $include_private = false)
    {
        if ($include_private) {
            return Post::orderBy("created_at", "desc")->paginate(20);
        } else {
            return Post::where("published", 1)->orderBy("created_at", "desc")->paginate(20);
        }
    }

    public static function allPosts(bool $include_private = false)
    {
        if ($include_private) {
            return Post::orderBy("created_at", "desc")->get();
        } else {
            return Post::where("published", 1)->orderBy("created_at", "desc")->get();
        }
    }

    public static function mostRecent()
    {
        return Post::latest()->take(100)->get();
    }

    public static function paginateForFeed()
    {
        return Post::where("published", 1)->orderBy("created_at", "desc")->paginate(12);
    }
}
