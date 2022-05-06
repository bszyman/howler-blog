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
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
        });

        Schema::table("friends", function (Blueprint $table) {
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
        });

        Schema::table("posts", function (Blueprint $table) {
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
        });

        Schema::table("sites", function (Blueprint $table) {
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        Schema::table('friends', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        Schema::table('sites', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
};
