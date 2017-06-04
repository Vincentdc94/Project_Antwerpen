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
            $table->string('address');
            $table->string('email');
            $table->string('tel');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('sights')->insert(
            array(
                'name' => 'Het MAS',
                'description' => 'In het MAS | Museum aan de Stroom maakt u kennis met Antwerpen in de wereld en met de wereld in Antwerpen. Gebruik al uw zintuigen om het rijke verleden van de stad, de stroom, de haven en de wereld te ontdekken. Geniet van het adembenemende uitzicht op de stad en laat je verrassen door de vele grote en kleine details van deze architecturale parel. ',
                'address' => 'Hanzestedenplaats 1, 2000 Antwerpen',
                'email' => 'mas@stad.antwerpen.be',
                'tel' => '03 338 44 00'
            )
        );

        DB::table('sights')->insert(
            array(
                'name' => 'De kathedraal',
                'description' => 'De Onze-Lieve-Vrouwekathedraal is een kathedraal in de Belgische stad Antwerpen. De kathedraal staat aan de Handschoenmarkt en is de hoofdkerk van het bisdom Antwerpen. Ze is gewijd aan Maria. De kerk was een kathedraal tussen 1559 en 1803 en vanaf 1961 tot heden. De toren van de Onze-Lieve-Vrouwekathedraal is als onderdeel van een groep van 56 belforten in België en Frankrijk opgenomen op de lijst van werelderfgoed van UNESCO.',
                'address' => 'Groenplaats 21, 2000 Antwerpen',
                'email' => 'info@dekathedraal.be',
                'tel' => '03 213 99 51'
            )
        );

        DB::table('sights')->insert(
            array(
                'name' => 'Gate 15',
                'description' => 'TAKEOFFANTWERP_ is de coworking/costudying space binnen GATE15. TAKEOFFANTWERP_ wil op diverse manieren Antwerpse student entrepreneurs ondersteunen: Welkom elke werkdag tussen 9 en 19u om in het popup café te komen werken, vergaderen, … Er zijn 3 grote meeting-tafels beschikbaar, zodat je extra ruimte hebt voor je coworking activiteiten. Elke dinsdag tussen 9 en 13u kan je met vragen of projecten terecht bij een persoonlijke starterscoach van de Stad Antwerpen. Een inspirerende plek nodig om een activiteit rond studentenondernemerschap of startende ondernemingen? Plan hier je evenement. TAKEOFFANTWERP_ is een samenwerking tussen de Universiteit Antwerpen, Karel de Grote-hogeschool, Artesis Plantijn Hogeschool, Hogere Zeevaartschool en de Stad Antwerpen.',
                'address' => 'Kleine Kauwenberg 15, 2000 Antwerpen',
                'email' => 'info@gate15.be',
                'tel' => '03 292 31 70'
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
