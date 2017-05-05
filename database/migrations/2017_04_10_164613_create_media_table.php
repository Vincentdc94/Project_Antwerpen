<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('url');
            //TODO: Jesse voeg hier is timestamps in
        });

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/1647d484-a281-4a73-ae76-66be03e2e920/varen%20maagdenpalm.jpg/contentimage_banner')
        );

        DB::table('media')->insert(
            array(
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=wvpZZiWRAQM')
        );

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/25c5470a-53eb-43be-b907-10b837bb435b/p15_sterilisatie_thinkstockPhotos-75627272.jpg/contentimage_banner')
        );

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/a64e4696-a844-40ce-a58a-2fc759ab9d78/Brocantwerpen_DEF.jpg/contentimage_banner')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
