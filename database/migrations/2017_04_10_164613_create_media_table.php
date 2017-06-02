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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/1647d484-a281-4a73-ae76-66be03e2e920/varen%20maagdenpalm.jpg/contentimage_banner'
                )
        );

        DB::table('media')->insert(
            array(
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=wvpZZiWRAQM'
                )
        );

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/25c5470a-53eb-43be-b907-10b837bb435b/p15_sterilisatie_thinkstockPhotos-75627272.jpg/contentimage_banner'
                )
        );

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/a64e4696-a844-40ce-a58a-2fc759ab9d78/Brocantwerpen_DEF.jpg/contentimage_banner'
                )
        );

        // foto sight MAS
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'http://www.femma.be/frontend/files/blog/images/source/uitstap-naar-het-mas.jpg'
            )
        );

        // foto sight kathedraal
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://denbeke.be/blog/wp-content/uploads/2015/04/Onze-Lieve-Vrouwekathedraal-Antwerpen.jpg'
            )
        );

        // foto sight achtertuin
        DB::table('media')->insert(
            array(
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=glwrnVnx0OI'
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
        Schema::dropIfExists('media');
    }
}
