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

        DB::table('categories')->insert(array('name' => 'Regio'));
        DB::table('categories')->insert(array('name' => 'Politiek'));
        DB::table('categories')->insert(array('name' => 'Economie'));
        DB::table('categories')->insert(array('name' => 'Wetenschap'));
        DB::table('categories')->insert(array('name' => 'Cultuur'));
        DB::table('categories')->insert(array('name' => 'Sport'));
        DB::table('categories')->insert(array('name' => 'Andere'));
        DB::table('categories')->insert(array('name' => 'Getuigenis'));
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
