<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('studiepunten')->nullable();
            $table->integer('geld')->nullable();
            $table->float('plezier')->nullable();
            $table->float('cultuur')->nullable();
            $table->float('gezondheid')->nullable();
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gameInfo');
    }
}
