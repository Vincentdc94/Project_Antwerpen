<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('categories')->insert(
            array('name' => 'Regio'),
            array('name' => 'Politiek'),
            array('name' => 'Economie'),
            array('name' => 'Wetenschap'),
            array('name' => 'Cultuur'),
            array('name' => 'Sport'),
            array('name' => 'Andere')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
