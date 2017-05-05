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
            $table->string('address');
            $table->string('email');
            $table->string('tel');
            $table->integer('school_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('campi', function ($table) {
            $table->foreign('school_id')->references('id')->on('schools');
        });

        DB::table('campi')->insert(
            array(
                'name' => 'Campus Zuid (school 1, contact 2)',
                'address' => 'In het Zuiden 88',
                'email' => 'campus@zuid.be',
                'tel' => '0541866523',
                'school_id' => '1'
            )
        );

        DB::table('campi')->insert(
            array(
                'name' => 'Campus Hoboken (school 1, contact 1)',
                'address' => 'Hobokenstraat 15',
                'email' => 'campus@hoboken.be',
                'tel' => '8080931',
                'school_id' => '1'
            )
        );

        DB::table('campi')->insert(
            array(
                'name' => 'Campus Drie Eiken (school 2, contact 1)',
                'address' => 'Eikenstraat 5',
                'email' => 'campus@drieeiken.be',
                'tel' => '5616985162',
                'school_id' => '2'
            )
        );

        DB::table('campi')->insert(
            array(
                'name' => 'Castle Black (school 3, contact 2)',
                'address' => 'The Wall, 2520 The North',
                'email' => 'lcmormont@thewall.we',
                'tel' => '65896256654',
                'school_id' => '3'
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
