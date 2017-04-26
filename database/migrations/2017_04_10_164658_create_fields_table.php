<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
        });

        DB::table('fields')->insert(
            array(
                'name' => 'Multimedia Technologie',
                'description' => 'Alles rond multimedia en technologie'),
            array(
                'name' => 'Marketing',
                'description' => 'Alles rond marketing'),
            array(
                'name' => 'Psychologie',
                'description' => 'Alles rond psychologie')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
