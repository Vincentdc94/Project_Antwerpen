<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('school_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('campi', function ($table) {
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });

        DB::table('campi')->insert(
            array(
                'name' => 'Campus Zuid (school 1, contact 2)',
                'school_id' => '1',
                'contact_id' => '2'
            )
        );

        DB::table('campi')->insert(
            array(
                'name' => 'Campus Hoboken (school 1, contact 1)',
                'school_id' => '1',
                'contact_id' => '1'
            )
        );

        DB::table('campi')->insert(
            array(
                'name' => 'Campus Drie Eiken (school 2, contact 1)',
                'school_id' => '2',
                'contact_id' => '1'
            )
        );

        DB::table('campi')->insert(
            array(
                'name' => 'Campus Random (school 3, contact 2)',
                'school_id' => '3',
                'contact_id' => '2'
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
        Schema::dropIfExists('campi');
    }
}
