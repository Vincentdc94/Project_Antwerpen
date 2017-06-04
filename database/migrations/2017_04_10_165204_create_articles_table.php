<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('author_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->boolean('frontPage')->default('0');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table('articles', function($table) {
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        // 1
        DB::table('articles')->insert(
            array(
                'title' => 'Welke muzikale student ben jij?',
                'body' => 'Uitgebreid wetenschappelijk onderzoek (lees: een brainstorm en veel verbeelding) toont aan dat de blokkende student kan ingedeeld worden in vijf muzikale groepen. Zelfkennis is het begin van alle wijsheid, en aangezien dat nu net is wat een student in het midden van de examenperiode nodig heeft lijsten we de verschillende categorieën even voor je op!

    Instrumentale muziek

​Klassiek of jazz, zolang het maar heerlijk rustig klinkt en geen afleidende woorden bevat ben jij tevreden! Ze zeggen toch ook dat baby’s slimmer worden als ze naar Mozart luisteren? Dan zal Beethoven bij jouw brein ook wel iets uithalen!

(suggestie: Gymnopédie - Satie, Close Cover – Wim Mertens)

    Foute meezingers

*We komen samen, in hetzelfde verhaal* Oké, het verhaal van de cursus voor je neus misschien, maar de zomerse sfeer en bijbehorende motivatie zit er wel al helemaal in! Die concentratie die je gebruikt om niet luidop mee te brullen met Don’t Stop Believing is misschien concentratie die je niet gebruikt voor het memoriseren van definities, maar het leven moet plezant blijven, of niet?

(suggestie: All Star – Smash Mouth, Wake Me Up Before You Go-Go – Wham!)

    Filmmuziek

Filmmuziek is een niet te onderschatten subcategorie van de instrumentale studenten: als de deadline nadert even loeispannende thrillermuziek, en tijdens een laatste herhalingsronde de dromerige Harry Potter-melodieën om je brein te kalmeren. Voor elke fase van het studeerproces is er een filmgenre dat voor de perfect bijpassende muziek zorgt!

(suggesties: Theory of Everything, Inception)

    Absolute stilte

Hoeft niet veel uitleg bij, toch? Laat al die afleiding maar, hoe effectiever je blokt hoe zonniger je pauzes zijn, dus laat die muziek maar uit en zet die ploat af.

(4’33 - John Cage, The Sound of Silence – Simon & Garfunkel)

    Favoriete nummers van favoriete artiest

Niets motiveert meer dan je lievelingsartiest! Je kent elk woord van elk nummer waarschijnlijk al van binnen en buiten, en weet exact wat er gaat komen. Je kan dus volledig focussen op de boeken voor je neus terwijl je haast zonder het zelf te beseffen zit mee te dansen op je bureaustoel.

(suggesties: je favoriete artiest --> shuffle --> geniet)

We hopen dat je je kan vinden in één van onze ongelooflijk wetenschappelijk verifieerbare categorieën! In heel veel STUDY360-locaties kan je gratis en voor niks een Sennheiser koptelefoon uitlenen dus geen excuus om onze muzikale suggesties niet eens te checken.
',
                'author_id' => '2',
                'category_id' => '5'
            )
        );

        // 2
        DB::table('articles')->insert(
            array(
                'title' => 'STUDY360: Study at unique locations in Antwerp',
                'body' => "GATE15 has found several great locations to motivate you: every single one is a remarkable place; some even offer stunning views of the city. Come and revise at these unique pop-up study locations during the revision period (8 May 2017 to 30 June 2017).
Locations

Brandweerkazerne -  Campus National - CEPA  - Den Bell - Havenhuis - Het Steen - Letterenhuis - MAS - Mercado - M HKA - Nokia -  Port of Creative Antwerp - Scoutshuis - SD Worx - TAKEOFFANTWERP_  - GATE15 - Theaterbuilding
How does it work?

You don't have to make a reservation to be sure you'll have a seat. Just check www.study360.be to see if there are seats available. We ask you to register once on the website. You will then be sent a personal access code by e-mail. At the location you enter your access code on the login screen. This allows us to display the number of available places live on the website. Consequently, other students have the chance to take your spot.
Extra facilities

We understand that you desperately need your social media break to cool down your brains while watching funny cat videos. That's why we provide you with free Wi-Fi on all locations. And for all who experience a severe study crisis, there are enormous amounts of coffee and water to help you get over it!  We also provide sport facilities, ear buds ánd headphones. Thanks to our partners CM, Chaudfontaine, Sennheiser, Decathlon and Koffie Verheyen.

All the necessary info, one adress: www.study360.be

Good luck!!",
                'author_id' => '1',
                'category_id' => '2'
            )
        );

        // 3
        DB::table('articles')->insert(
            array(
                'title' => 'Mijn ervaring op de KdG hogeschool',
                'body' => 'Mijn naam is Domien en ik ben drie jaar geleden beginnen studeren op de Karel de Grote hogeschool in Hoboken. Ik volg nu Multimedia Technology, en normaal gezien was ik dit jaar afgestudeerd, maar ik ga er nog eentje extra moeten doen. Alhoewel de studies voor mij persoonlijk nogal stroef verlopen, moet ik wel zeggen dat ik absoluut geen spijt heb! Het grootste deel van de vakken spreken me echt aan, en vanaf het tweede jaar wordt het alleen maar interessanter. Zeker een aanrader voor lovers van multimedia!',
                'author_id' => '4',
                'category_id' => '8'
            )
        );

        // 4
        DB::table('articles')->insert(
            array(
                'title' => 'Ga nooit naar Universiteit Antwerpen...',
                'body' => 'Deze woorden gaan voor sommige mensen misschien hard aankomen, maar mijn ervaring bij UA kon niet slechter zijn. Ik studeer rechtspraktijk, en de docenten zijn absoluut ongeinteresseerd en kunnen amper iets uitleggen. Ik heb horen zeggen dat dit alleen zo is in deze richting, en ik hoop dat dit waar is, want het is helemaal niet aan te staan. Ik begin nog liever een carriere als visverkoper.',
                'author_id' => '3',
                'category_id' => '8',
            )
        );

        // 5
        DB::table('articles')->insert(
            array(
                'title' => 'Antwerp low emission zone becomes effective on 1 February 2017',
                'body' => 'Antwerp is working to improve air quality in the city. That is why the city is enforcing a low emission zone (LEZ) from 1 February 2017. Vehicles that emit a lot of soot and particulate matter may no longer enter the city centre or Linkeroever from this date. This will improve overall air quality.',
                'author_id' => '5',
                'category_id' => '7',
            )
        );

        // 5
        DB::table('articles')->insert(
            array(
                'title' => 'Our studentguide is waiting for you!',
                'body' => 'Behind every man stands a strong woman, and behind every student stands a solid studentguide. Just like Batman would not survive his adventures without Robin, you will withstand all your student related problems with this handy booklet. Our student redaction traversed the whole city and assembled all the hotspots Antwerp has to offer. They listed the cheapest supermarkets, information about sport facilities in order to eliminate the consequences of that nightly kebab and the trendiest shops and bars. Though you also find useful information in the Yellow pages to help you with all your questions. Come and get your free Studentguide at GATE15, Kleine Kauwenberg 15 or perhaps you come across our streetteam and seize one right then.',
                'author_id' => '1',
                'category_id' => '5',
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
        Schema::dropIfExists('articles');
    }
}
