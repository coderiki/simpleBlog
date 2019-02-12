<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title", 255);
            $table->string("slug", 255);
            $table->text("content");
            $table->string("media_path", 255);
            $table->unsignedInteger("category_id");
            $table->unsignedInteger("user_id");
            $table->boolean("status")->default(false)->comment("yayınlanma durumu");
            $table->timestamp("publication_time");
            $table->timestamps();
            $table->foreign("category_id")
                  ->references("id")
                  ->on("categories");
            $table->foreign("user_id")
                  ->references("id")
                  ->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
