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
            $table->string('link');
            $table->integer('school_id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('fields', function($table) {
            $table->foreign('school_id')->references('id')->on('schools');
        });

        DB::table('fields')->insert(
            array(
                'name' => 'Multimedia Technologie',
                'description' => 'Alles rond multimedia en technologie',
                'link' => 'https://www.youtube.com/watch?v=DsuaTW71v74',
                'school_id' => '1'
            )   
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Marketing',
                'description' => 'Alles rond marketing',
                'link' => 'https://www.youtube.com/watch?v=DsuaTW71v74',
                'school_id' => '2'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Psychologie',
                'description' => 'Alles rond psychologie',
                'link' => 'https://www.youtube.com/watch?v=DsuaTW71v74',
                'school_id' => '2'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Nutteloosheid',
                'description' => 'Leer alles over nutteloos zijn',
                'link' => 'https://www.youtube.com/watch?v=DsuaTW71v74',
                'school_id' => '1'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'White Walkers',
                'description' => 'WHITE WALKERS HAVENT BEEN NORTH OF THE WALL FOR A THOUSAND FOOKIN YEARS',
                'link' => 'https://www.youtube.com/watch?v=DsuaTW71v74',
                'school_id' => '3'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Fuck Olly',
                'description' => 'Hij doe alleen maar dinge verkeerd eerlijk',
                'link' => 'https://www.youtube.com/watch?v=DsuaTW71v74',
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
        Schema::dropIfExists('fields');
    }
}
