<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Repositories\PostStore;
use App\Models\Repositories\SiteStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Posts extends Controller
{
    public function detailView($id)
    {
        $site_config = SiteStore::fetchActiveConfig();
        $post = PostStore::fetchWithId($id);

        if (!Auth::check()) {
            if (!$post->getPublished()) {
                abort(404);
            }
        }

        $params = [
            "post" => $post,
            "site_config" => $site_config,
            "feed_nav_selected" => 1
        ];

        return view('post', $params);
    }

    public function savePost(Request $request)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $post = Post::create([
            "post_text" => $request->input("post_text"),
            "published" => $request->boolean("published")
        ]);

        $post->save();

        return redirect("/");
    }

    public function updatePost(Request $request, $id)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $post = PostStore::fetchWithId($id);
        $post->post_text = $request->input("post_text");
        $post->published = $request->boolean("published");
        $post->save();

        return redirect("/posts/" . $post->getId());
    }

    public function deletePost(Request $request, $id)
    {
        if (!Auth::check()) {
            abort(401);
        }

        $post = PostStore::fetchWithId($id);
        $post->delete();

        return redirect("/");
    }
}
