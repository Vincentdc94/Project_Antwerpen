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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('gameInfo', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::table('gameInfo')->insert(
            array(
                'studiepunten' => '80',
                'geld' => '700',
                'plezier' => '90',
                'cultuur' => '50',
                'gezondheid' => '10',
                'user_id' => '1'
            )
        );

        DB::table('gameInfo')->insert(
            array(
                'studiepunten' => '2',
                'geld' => '15',
                'plezier' => '10',
                'cultuur' => '100',
                'gezondheid' => '50',
                'user_id' => '2'
            )
        );

        DB::table('gameInfo')->insert(
            array(
                'studiepunten' => '50',
                'geld' => '50',
                'plezier' => '50',
                'cultuur' => '50',
                'gezondheid' => '50',
                'user_id' => '3'
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
        Schema::dropIfExists('gameInfo');
    }
}
