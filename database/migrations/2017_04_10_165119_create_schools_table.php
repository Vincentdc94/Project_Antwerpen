<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->text('logo_url');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('schools')->insert(
            array(
                'name' => 'Karel de Grote',
                'description' => 'Hou je van chaos en wanorde? Zijn duidelijk gestructureerde lessenroosters en handige online portalen maar bijzaak in jouw studentenleven? Wil je examens afleggen op de meest ongepaste momenten mogelijk? Dan is KdG iets voor jou!',
                'logo_url' => 'http://i.imgur.com/WADZDQI.jpg'
            )
        );

        DB::table('schools')->insert(
            array(
                'name' => 'Universiteit Antwerpen',
                'description' => 'Amai zeg, jij bent wel een slimmerik! Hogeschool lijkt me niets voor jou, jij bent er zo eentje die te arrogant is en een te dikke nek heeft, ga jij maar naar Universiteit Antwerpen. Perfect voor types zoals jij.',
                'logo_url' => 'http://i.imgur.com/yGpfAFe.jpg'
            )
        );

        DB::table('schools')->insert(
            array(
                'name' => 'The Nights Watch',
                'description' => 'Hear my words, and bear witness to my vow. Night gathers, and now my watch begins. It shall not end until my death. I shall take no wife, hold no lands, father no children. I shall wear no crowns and win no glory. I shall live and die at my post. I am the sword in the darkness. I am the watcher on the walls. I am the shield that guards the realms of men. I pledge my life and honor to the Nights Watch, for this night and all the nights to come.',
                'logo_url' => 'http://img07.deviantart.net/3018/i/2012/139/4/4/night__s_watch_crest_by_liquidsouldesign-d50cz7o.jpg'
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
        Schema::dropIfExists('schools');
    }
}
