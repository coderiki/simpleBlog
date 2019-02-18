<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('homeTitle', 255)->default('Blog');
            $table->integer('postInCategoryPaginateCount')->default(10);
            $table->integer('postInHomePaginateCount')->default(10);
            $table->integer('postInTagPaginateCount')->default(10);
            $table->integer('commentInPostCount')->default(10);
            $table->integer('commentDefaultStatus')->default(0)->comment('Eklenen yorum direk yayınlansın istiyorsak 1 olacak');
            $table->integer('commentabilityStatus')->default(1)->comment('Yorum yapılabilirlik durumu açık olsun istiyorsak 1 olacak');
            $table->string('postDefaultImage')->default('image\/web\/no-image-min.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
