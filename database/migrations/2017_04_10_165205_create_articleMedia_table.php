<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleMedia', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('articleMedia', function ($table) {
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articleMedia');
    }
}
