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
            $table->string('avatar');
            $table->integer('role_id')->unsigned()->default('1');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->rememberToken();
        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        DB::table('users')->insert(
            array(
                'firstName' => 'Jesse',
                'lastName' => 'Op de Beeck',
                'email' => 'jesse@opdebeeck.be',
                'password' => bcrypt('jesseopdebeeck'),
                'role_id' => 3
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Axel',
                'lastName' => 'Driesen',
                'email' => 'axel@driesen.be',
                'password' => bcrypt('axeldriesen'),
                'role_id' => 1
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Domien',
                'lastName' => 'Vissenaeken',
                'email' => 'domien@vissenaeken.be',
                'password' => bcrypt('domienvissenaeken'),
                'role_id' => 2
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Vincent',
                'lastName' => 'De Coen',
                'email' => 'vincent@decoen.be',
                'password' => bcrypt('vincentdecoen'),
                'role_id' => 4
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Een',
                'lastName' => 'Student',
                'email' => 'student@stan.be',
                'password' => bcrypt('student'),
                'role_id' => 1
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Een',
                'lastName' => 'Approver',
                'email' => 'approver@stan.be',
                'password' => bcrypt('approver'),
                'role_id' => 2
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Een',
                'lastName' => 'Editor',
                'email' => 'editor@stan.be',
                'password' => bcrypt('editor'),
                'role_id' => 3
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Een',
                'lastName' => 'Admin',
                'email' => 'admin@stan.be',
                'password' => bcrypt('admin'),
                'role_id' => 4
            )
        );

        DB::table('users')->insert(
            array(
                'firstName' => 'Game',
                'lastName' => 'Test',
                'email' => 'game@test.be',
                'password' => bcrypt('gametest'),
                'role_id' => 1
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
        Schema::dropIfExists('users');
    }
}