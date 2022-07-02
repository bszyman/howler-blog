<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Repositories\PostStore;

class JsonSimpleFeed extends Controller
{
    public function __invoke()
    {
        $posts = PostStore::allPosts(include_private: true);

        return json_encode($posts);
    }
}
