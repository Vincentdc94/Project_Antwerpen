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
            $table->integer('contact_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('sights', function($table) {
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('media_id')->references('id')->on('media');
        });

        DB::table('sights')->insert(
            array(
                'name' => 'Het MAS',
                'description' => 'Een mooi en modern museum',
                'contact_id' => '1',
                'media_id' => '1'
            )
        );

        DB::table('sights')->insert(
            array(
                'name' => 'De kathedraal',
                'description' => 'Een glorieus bastion van religie en cultuur',
                'contact_id' => '1',
                'media_id' => '2'
            )
        );

        DB::table('sights')->insert(
            array(
                'name' => 'De Vincent zijn achtertuin',
                'description' => 'Oei daar valt ni veel over te zeggen vrees ik',
                'contact_id' => '2',
                'media_id' => '3'
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
