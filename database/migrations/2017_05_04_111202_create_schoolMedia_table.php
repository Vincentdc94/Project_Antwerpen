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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('schoolMedia', function($table) {
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media');
        });

        DB::table('schoolMedia')->insert(
            array(
                'school_id' => '1',
                'media_id' => '8'
            )
        );

         DB::table('schoolMedia')->insert(
            array(
                'school_id' => '2',
                'media_id' => '9'
            )
        );

          DB::table('schoolMedia')->insert(
            array(
                'school_id' => '3',
                'media_id' => '10'
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
        Schema::dropIfExists('schoolMedia');
    }
}
