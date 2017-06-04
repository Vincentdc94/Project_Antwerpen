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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('article_media', function ($table) {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media');
        });

        // media 11 voor artikel 1
        DB::table('article_media')->insert(
            array(
                'article_id' => '1',
                'media_id' => '11'
            )
        );

        // media 12 voor artikel 2
        DB::table('article_media')->insert(
            array(
                'article_id' => '2',
                'media_id' => '12'
            )
        );

        // media 2 voor getuigenis 1 = artikel 3
        DB::table('article_media')->insert(
            array(
                'article_id' => '3',
                'media_id' => '2'
            )
        );

        // media 4 voor getuigenis 2 = artikel 4
        DB::table('article_media')->insert(
            array(
                'article_id' => '4',
                'media_id' => '4'
            )
        );

        // media 13 voor artikel 5
        DB::table('article_media')->insert(
            array(
                'article_id' => '5',
                'media_id' => '13'
            )
        );

        // media 14 voor artikel 6
        DB::table('article_media')->insert(
            array(
                'article_id' => '6',
                'media_id' => '14'
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
