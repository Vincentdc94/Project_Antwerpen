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
        Schema::create('gameinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_beers_drunk');
            $table->integer('total_hours_studied');
            $table->integer('total_exams_failed');
            $table->integer('total_exams_passed');
            $table->integer('total_money_collected');
            $table->integer('total_money_spent');
            $table->integer('total_time_sported');
            $table->integer('total_time_culture');
            $table->integer('total_time_party');
            $table->integer('total_time_coma');
            $table->integer('total_time_blackout');
            $table->integer('user_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('gameInfo', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '1'
            )
        );

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '2'
            )
        );

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '3'
            )
        );

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '4'
            )
        );

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '5'
            )
        );

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '6'
            )
        );

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '7'
            )
        );

        DB::table('gameinfo')->insert(
            array(
                'total_hours_studied' => '80',
                'total_money_collected' => '700',
                'total_exams_failed' => '90',
                'total_hours_studied' => '50',
                'total_beers_drunk' => '10',
                'user_id' => '8'
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
