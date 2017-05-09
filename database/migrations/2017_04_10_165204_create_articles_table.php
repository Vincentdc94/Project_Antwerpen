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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('articles', function($table) {
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldartikel 1',
                'body' => 'Dit artikel is geschreven door Axel Driesen (2) en valt onder de categorie Cultuur (5) en is nog niet approved',
                'author_id' => '2',
                'category_id' => '5'
            )
        );

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldartikel 2',
                'body' => 'Dit artikel is geschreven door Jesse (1) en valt onder de categorie Politiek (2) en is approved',
                'author_id' => '1',
                'category_id' => '2'
            )
        );

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldgetuigenis 1',
                'body' => 'Dit is een getuigenis van Jesse (1) en is approved',
                'author_id' => '1',
                'category_id' => '8'
            )
        );

        DB::table('articles')->insert(
            array(
                'title' => 'Voorbeeldgetuigenis 2',
                'body' => 'Dit is een getuigenis van Axel (2) en is nog niet approved',
                'author_id' => '2',
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
