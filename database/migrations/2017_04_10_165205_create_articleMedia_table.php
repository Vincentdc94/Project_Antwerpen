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
        Schema::create('article_media', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('article_media', function ($table) {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });

        DB::table('article_media')->insert(
            array(
                'article_id' => '3',
                'media_id' => '2'
            )
        );

        DB::table('article_media')->insert(
            array(
                'article_id' => '4',
                'media_id' => '4'
            )
        );
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
