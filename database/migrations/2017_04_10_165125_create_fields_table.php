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
                'description' => 'Op KdG kan je binnen de opleiding professionele bachelor Multimedia en Communicatietechnologie het traject Multimedia Technology volgen.',
                'link' => 'https://www.kdg.be/multimedia-technology',
                'school_id' => '1'
            )   
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Chemie',
                'description' => 'Chemie is de wetenschap die materie, ofwel stoffen, bestudeert. Als chemicus probeer je de eigenschappen van stoffen, zoals dichtheid, kleur en smaak, te verklaren. Om dat te kunnen doen, moet je alles leren over de onderdelen waaruit stoffen zijn opgebouwd, atomen en moleculen: je leert hoe je moleculen maakt, wat hun structuur en eigenschappen zijn en hoe ze met elkaar reageren. Zo kan je zelf nieuwe stoffen en materialen maken of oplossingen zoeken voor allerlei problemen. Dat is wat je als chemicus leert. Waar het ‘m daarbij vooral om gaat, is het begrijpen en toepassen.',
                'link' => 'https://www.uantwerpen.be/nl/onderwijs/opleidingsaanbod/bachelor-chemie/profiel/',
                'school_id' => '2'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Psychologie',
                'description' => 'Waarom gedragen mensen zich zoals zij doen? Zijn verschillen in intelligentie en persoonlijkheid erfelijk of bepaald door de omgeving? Wat is de samenhang tussen gedrag, gedachten en gevoelens? Hoe beïnvloeden mensen elkaar? Hoe ontwikkelt de mens zich van baby tot volwassene? Is leiding geven een kunst of een kunde? Bij 25 procent van de bevolking ontstaan psychische problemen op het werk. Hoe komt dat en hoe kan men deze stress te lijf gaan? Waarom houden veel mensen er minder gezonde leefgewoonten op na? De psychologie probeert een antwoord te geven op vragen die dicht bij ons liggen: de antwoorden leren ons iets over anderen, maar ook over onszelf.',
                'link' => 'https://www.uantwerpen.be/nl/onderwijs/permanentevorming/centra/open-universiteit/studieaanbod/bachelor-master/psychologie/',
                'school_id' => '2'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Bedrijfsmanagement',
                'description' => 'Mik je op een sleutelfunctie in een internationaal bedrijf? Of liever supporter van je eigen bedrijf? Zin in een job als accountant of verzekeringsagent? Alles in je mars om wereldwijd haventransport te regelen? Klaar om jezelf als marketeer op de kaart te zetten? Of word je de juridische duizendpoot waar iedereen naar op zoek is? Dan ben je bij de opleiding Bedrijfsmanagement aan het juiste adres.
',
                'link' => 'https://www.kdg.be/bedrijfsmanagement',
                'school_id' => '1'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Kleuteronderwijs',
                'description' => 'De bachelor Kleuteronderwijs is dé opleiding voor jou omdat jij gek bent op kinderen. Je bent een warm iemand die kleuters wil begeleiden bij hun eerste schoolervaring. Je wil samen met hen verwonderd zijn, muziek maken, spelen en boeiende ervaringen opdoen.',
                'link' => 'https://www.ap.be/onderwijs-en-training/opleidingen/kleuteronderwijs',
                'school_id' => '3'
            )
        );

        DB::table('fields')->insert(
            array(
                'name' => 'Drama',
                'description' => 'De opleiding Drama –of je nu kiest voor Acteren, Kleinkunst of Woordkunst– richt zich tot jouw individuele, artistieke persoonlijkheid. Onze belangrijkste troef is het docententeam: een uitgebalanceerde ploeg van mensen die naast hun artistieke carrière de ambitie hebben om jong podiumtalent op maat te begeleiden. Elk academiejaar brengt een reeks uitdagende projecten die je technieken en expressiemogelijkheden aanreiken. Zo ontwikkelen we jouw (podium)persoonlijkheid die je nodig hebt om te acteren, te schrijven, te zingen, liedjes, reportages en voorstellingen te maken.',
                'link' => 'https://www.ap.be/koninklijk-conservatorium/opleidingen/drama',
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
