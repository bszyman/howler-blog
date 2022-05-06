<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Controllers\Home::class);
Route::get('/feeds/atom', \App\Http\Controllers\AtomFeed::class);
Route::get('/feeds/json', \App\Http\Controllers\JsonFeed::class);
Route::get('/feeds/json-simple', \App\Http\Controllers\JsonSimpleFeed::class);
Route::get('/feeds/rss', \App\Http\Controllers\RssFeed::class);

Route::controller(\App\Http\Controllers\Initialization::class)->group(function () {
    Route::get("/initialize/", "presentInitForm");
    Route::post("/initialize/save", "saveInitForm");
});

Route::controller(\App\Http\Controllers\Posts::class)->group(function () {
    Route::get("/posts/{id}", "detailView");
    Route::post("/posts/create", "savePost");
    Route::post("/posts/update/{id}", "updatePost");
    Route::post("/posts/delete/{id}", "deletePost");
});

Route::controller(\App\Http\Controllers\Bookmarks::class)->group(function () {
    Route::get("/bookmarks", "browse");
    Route::get("/bookmarks/{id}", "detailView");
    Route::post("/bookmarks/save", "saveBookmark");
    Route::post("/bookmarks/update/{id}", "updateBookmark");
    Route::post("/bookmarks/delete/{id}", "deleteBookmark");
});

Route::controller(\App\Http\Controllers\Following::class)->group(function () {
    Route::get("/following", "browse");
    Route::post("/following/start-following", "startFollowing");
    Route::post("/following/stop-following/{id}", "stopFollowing");
});

Route::controller(\App\Http\Controllers\Settings::class)->group(function () {
    Route::get("/settings", "viewSettings");
    Route::post("/settings/update", "saveSettings");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
