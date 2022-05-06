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
        Schema::table("bookmarks", function (Blueprint $table) {
            $table->string("image")->nullable();
        });

        Schema::table("friends", function (Blueprint $table) {
            $table->string("image")->nullable();
        });

        Schema::table("posts", function (Blueprint $table) {
            $table->string("media1")->nullable();
            $table->string("media2")->nullable();
            $table->string("media3")->nullable();
            $table->string("media4")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("bookmarks", function (Blueprint $table) {
            $table->dropColumn("image");
        });

        Schema::table("friends", function (Blueprint $table) {
            $table->dropColumn("image");
        });

        Schema::table("posts", function (Blueprint $table) {
            $table->dropColumn("media1");
            $table->dropColumn("media2");
            $table->dropColumn("media3");
            $table->dropColumn("media4");
        });
    }
};
