<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->binary('avatar');
            $table->integer('role_id')->unsigned()->default('1');
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        DB::table('users')->insert(
            array(
                'firstName' => 'Jesse',
                'lastName' => 'Op de Beeck',
                'email' => 'spificator@hotmail.com',
                'password' => 'jesseopdebeeck',
                'role_id' => '3')
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Axel',
                'lastName' => 'Driesen',
                'email' => 'lelijkeaxel@hotmail.com',
                'password' => 'axeldriesen',
                'role_id' => '1')
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Vincent',
                'lastName' => 'De Coen',
                'email' => 'lelijkevincent@hotmail.com',
                'password' => 'vincentdecoen',
                'role_id' => '4')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}