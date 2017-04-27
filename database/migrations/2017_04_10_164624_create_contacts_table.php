<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('email');
            $table->string('tel');
            $table->timestamps();
        });

        DB::table('contacts')->insert(
            array(
                'address' => 'Ranstsesteenweg 173, 2520 Ranst',
                'email' => 'emailvancontact@hotmail.com',
                'tel' => '0055887799'
            )
        );

        DB::table('contacts')->insert(
            array(
                'address' => 'Sparreweg 69, 2520 Emmele',
                'email' => 'nogeenemailvancontact@hotmail.com',
                'tel' => '9955664477'
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
        Schema::dropIfExists('contacts');
    }
}
