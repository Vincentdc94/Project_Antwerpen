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
        Schema::create('game_info', function (Blueprint $table) {
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

        Schema::table('game_info', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '10',
                'total_hours_studied' => '20',
                'total_exams_failed' => '30',
                'total_exams_passed' => '40',
                'total_money_collected' => '50',
                'total_money_spent' => '60',
                'total_time_sported' => '70',
                'total_time_culture' => '80',
                'total_time_party' => '90',
                'total_time_coma' => '100',
                'total_time_blackout' => '110',
                'user_id' => '1'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '10645',
                'total_hours_studied' => '657',
                'total_exams_failed' => '889',
                'total_exams_passed' => '5412',
                'total_money_collected' => '48',
                'total_money_spent' => '98152',
                'total_time_sported' => '564',
                'total_time_culture' => '97',
                'total_time_party' => '22',
                'total_time_coma' => '1118',
                'total_time_blackout' => '785',
                'user_id' => '2'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '658',
                'total_hours_studied' => '888',
                'total_exams_failed' => '666',
                'total_exams_passed' => '778',
                'total_money_collected' => '442',
                'total_money_spent' => '44865',
                'total_time_sported' => '5145',
                'total_time_culture' => '995',
                'total_time_party' => '78964',
                'total_time_coma' => '2186',
                'total_time_blackout' => '176',
                'user_id' => '3'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '1569',
                'total_hours_studied' => '1568',
                'total_exams_failed' => '52498',
                'total_exams_passed' => '546',
                'total_money_collected' => '546',
                'total_money_spent' => '5416',
                'total_time_sported' => '1658',
                'total_time_culture' => '47878',
                'total_time_party' => '492',
                'total_time_coma' => '48936',
                'total_time_blackout' => '14987',
                'user_id' => '4'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '1655',
                'total_hours_studied' => '65841',
                'total_exams_failed' => '39865',
                'total_exams_passed' => '484',
                'total_money_collected' => '16516',
                'total_money_spent' => '1653',
                'total_time_sported' => '6512',
                'total_time_culture' => '2265',
                'total_time_party' => '485',
                'total_time_coma' => '283',
                'total_time_blackout' => '2612',
                'user_id' => '5'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '1566',
                'total_hours_studied' => '162',
                'total_exams_failed' => '5546',
                'total_exams_passed' => '564',
                'total_money_collected' => '258',
                'total_money_spent' => '168',
                'total_time_sported' => '9841',
                'total_time_culture' => '564',
                'total_time_party' => '186',
                'total_time_coma' => '1168',
                'total_time_blackout' => '7653',
                'user_id' => '6'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '986741',
                'total_hours_studied' => '12354',
                'total_exams_failed' => '21354',
                'total_exams_passed' => '4580',
                'total_money_collected' => '46598',
                'total_money_spent' => '4658',
                'total_time_sported' => '6584',
                'total_time_culture' => '8694',
                'total_time_party' => '68945',
                'total_time_coma' => '6854',
                'total_time_blackout' => '689',
                'user_id' => '7'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '46598',
                'total_hours_studied' => '645978',
                'total_exams_failed' => '1469',
                'total_exams_passed' => '9784',
                'total_money_collected' => '6615',
                'total_money_spent' => '46581',
                'total_time_sported' => '86945',
                'total_time_culture' => '475',
                'total_time_party' => '46581',
                'total_time_coma' => '65',
                'total_time_blackout' => '6514',
                'user_id' => '8'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '4657',
                'total_hours_studied' => '1456',
                'total_exams_failed' => '6584',
                'total_exams_passed' => '5658',
                'total_money_collected' => '45167',
                'total_money_spent' => '1465',
                'total_time_sported' => '6541',
                'total_time_culture' => '6154',
                'total_time_party' => '6145',
                'total_time_coma' => '5163',
                'total_time_blackout' => '565',
                'user_id' => '9'
            )
        );

        DB::table('game_info')->insert(
            array(
                'total_beers_drunk' => '198',
                'total_hours_studied' => '489',
                'total_exams_failed' => '14569',
                'total_exams_passed' => '165',
                'total_money_collected' => '541',
                'total_money_spent' => '154',
                'total_time_sported' => '91',
                'total_time_culture' => '9651',
                'total_time_party' => '9165',
                'total_time_coma' => '1654',
                'total_time_blackout' => '156',
                'user_id' => '10'
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
        Schema::dropIfExists('game_info');
    }
}
