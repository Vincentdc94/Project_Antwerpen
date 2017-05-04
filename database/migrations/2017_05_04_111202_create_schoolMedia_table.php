<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolMedia', function (Blueprint $table) {
            $table->integer('school_id')->unsigned();
            $table->integer('media_id')->unsigned();
        });

        Schema::table('schoolMedia', function($table) {
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schoolMedia');
    }
}
