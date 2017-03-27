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
            $table->text('description');
            $table->integer('school_id');
            $table->integer('contact_id');
            $table->integer('field_id');
            $table->timestamps();
        });

        Schema::table('campi', function($table) {
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('field_id')->references('campus_id')->on('campusFields');
        });
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
