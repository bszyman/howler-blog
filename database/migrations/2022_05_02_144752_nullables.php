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
        Schema::table("sites", function (Blueprint $table) {
            $table->string("site_url")->nullable()->change();
            $table->string("bio_name")->nullable()->change();
            $table->string("bio")->nullable()->change();
            $table->string("location")->nullable()->change();
            $table->string("social_flickr")->nullable()->change();
            $table->string("social_instagram")->nullable()->change();
            $table->string("social_soundcloud")->nullable()->change();
            $table->string("social_unsplash")->nullable()->change();
            $table->string("social_vimeo")->nullable()->change();
            $table->string("social_website")->nullable()->change();
            $table->string("social_youtube")->nullable()->change();
            $table->string("social_bitbucket")->nullable()->change();
            $table->string("social_github")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("sites", function (Blueprint $table) {
            $table->string("site_url")->nullable(false)->change();
            $table->string("bio_name")->nullable(false)->change();
            $table->string("bio")->nullable(false)->change();
            $table->string("location")->nullable(false)->change();
            $table->string("social_flickr")->nullable(false)->change();
            $table->string("social_instagram")->nullable(false)->change();
            $table->string("social_soundcloud")->nullable(false)->change();
            $table->string("social_unsplash")->nullable(false)->change();
            $table->string("social_vimeo")->nullable(false)->change();
            $table->string("social_website")->nullable(false)->change();
            $table->string("social_youtube")->nullable(false)->change();
            $table->string("social_bitbucket")->nullable(false)->change();
            $table->string("social_github")->nullable(false)->change();
        });
    }
};
