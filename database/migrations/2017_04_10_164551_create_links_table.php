<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('links')->insert(
            array(
                'name' => 'Het MAS',
                'url' => 'http://www.mas.be/en',
                'description' => 'In het MAS | Museum aan de Stroom maakt u kennis met Antwerpen in de wereld en met de wereld in Antwerpen. Gebruik al uw zintuigen om het rijke verleden van de stad, de stroom, de haven en de wereld te ontdekken. Geniet van het adembenemende uitzicht op de stad en laat je verrassen door de vele grote en kleine details van deze architecturale parel.'),
            array(
                'name' => 'Antwerpen',
                'url' => 'https://www.antwerpen.be/nl/home',
                'description' => 'De officiele website van de stad Antwerpen.')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
