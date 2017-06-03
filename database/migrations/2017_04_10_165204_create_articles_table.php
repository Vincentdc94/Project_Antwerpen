<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('author_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->boolean('frontPage')->default('0');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('articles', function($table) {
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldartikel 1',
                'body' => 'Dit artikel is geschreven door Jesse Op de Beeck en valt onder de categorie Cultuur',
                'author_id' => '2',
                'category_id' => '5'
            )
        );

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldartikel 2',
                'body' => 'Dit artikel is geschreven door Getalife App en valt onder de categorie Politiek',
                'author_id' => '1',
                'category_id' => '2'
            )
        );

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldgetuigenis 1',
                'body' => 'Dit is een getuigenis van Domien Vissenaeken en heeft een video',
                'author_id' => '4',
                'category_id' => '8'
            )
        );

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldgetuigenis 2',
                'body' => 'Dit is een getuigenis van Axel Driesen en heeft een image',
                'author_id' => '3',
                'category_id' => '8',
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
        Schema::dropIfExists('articles');
    }
}
