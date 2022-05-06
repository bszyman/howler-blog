<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("bookmarks", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("title");
            $table->string("description");
            $table->string("url");
            $table->boolean("public");
        });

        Schema::create("friends", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("url");
        });

        Schema::create("posts", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("post_text");
            $table->string("quote_from");
            $table->boolean("published");
            $table->uuid("parent");
        });

        Schema::create("sites", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("site_url");
            $table->string("site_name");
            $table->string("bio_name");
            $table->string("bio");
            $table->string("location");
            $table->boolean("include_feed");
            $table->boolean("include_bookmarks");
            $table->boolean("include_following");
            $table->boolean("allow_rss_feed");
            $table->boolean("allow_atom_feed");
            $table->string("social_flickr");
            $table->string("social_instagram");
            $table->string("social_soundcloud");
            $table->string("social_unsplash");
            $table->string("social_vimeo");
            $table->string("social_website");
            $table->string("social_youtube");
            $table->string("social_bitbucket");
            $table->string("social_github");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("bookmarks");
        Schema::dropIfExists("friends");
        Schema::dropIfExists("posts");
        Schema::dropIfExists("sites");
    }
};
