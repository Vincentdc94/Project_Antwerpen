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
            $table->integer('studiepunten')->default('0');
            $table->integer('geld')->default('0');
            $table->float('plezier')->default('0');
            $table->float('cultuur')->default('0');
            $table->float('gezondheid')->default('0');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('gameInfo', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
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
