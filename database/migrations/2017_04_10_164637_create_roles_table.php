<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('roles')->insert(
            array('name' => 'Student')
        );

        DB::table('roles')->insert(
            array('name' => 'Approver')
        );

        DB::table('roles')->insert(
            array('name' => 'Editor')
        );

        DB::table('roles')->insert(
            array('name' => 'Admin')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
