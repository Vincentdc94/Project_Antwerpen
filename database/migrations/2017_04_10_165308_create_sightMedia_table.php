<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSightMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_sight', function (Blueprint $table) {
            $table->integer('sight_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('media_sight', function($table) {
            $table->foreign('sight_id')->references('id')->on('sights')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media');
        });

        // MAS
        DB::table('media_sight')->insert(
            array(
                'sight_id' => '1',
                'media_id' => '5'
            )
        );

        // kathedraal
        DB::table('media_sight')->insert(
            array(
                'sight_id' => '2',
                'media_id' => '6'
            )
        );

        // gate15
        DB::table('media_sight')->insert(
            array(
                'sight_id' => '3',
                'media_id' => '7'
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
        Schema::dropIfExists('sight_media');
    }
}
