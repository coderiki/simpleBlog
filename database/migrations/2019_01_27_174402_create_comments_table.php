<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('email', 100);
            $table->ipAddress('ip');
            $table->text("comment")->comment("max length 1k validation");
            $table->unsignedInteger("post_id");
            $table->boolean('status');
            $table->timestamps();
            $table->foreign("post_id")
                  ->references("id")
                  ->on("posts")
                  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
