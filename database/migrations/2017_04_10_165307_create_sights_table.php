<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('address');
            $table->string('email');
            $table->string('tel');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('sights')->insert(
            array(
                'name' => 'Het MAS',
                'description' => 'Een mooi en modern museum',
                'address' => 'Aan de Stroom 25',
                'email' => 'het@mas.be',
                'tel' => '0242042025'
            )
        );

        DB::table('sights')->insert(
            array(
                'name' => 'De kathedraal',
                'description' => 'Een glorieus bastion van religie en cultuur',
                'address' => 'In het midden vant stad',
                'email' => 'de@kathedraal.be',
                'tel' => '1337507'
            )
        );

        DB::table('sights')->insert(
            array(
                'name' => 'De Vincent zijn achtertuin',
                'description' => 'Oei daar valt ni veel over te zeggen vrees ik',
                'address' => 'Ergens in Emblem 78',
                'email' => 'vincent@decoen.be',
                'tel' => '6969696969'
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
        Schema::dropIfExists('sights');
    }
}
